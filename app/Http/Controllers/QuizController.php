<?php

namespace App\Http\Controllers;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\History;
use OpenAI;

class QuizController extends Controller
{
    public $topScores;

    public function index(): View
    {
        $questionsPath = resource_path('data/questions.json');
        $questions = json_decode(file_get_contents($questionsPath), true);

        return view('quiz', compact('questions'));
    }

    public function submit(Request $request)
    {
        $questionsPath = resource_path('data/questions.json');
        $questions = json_decode(file_get_contents($questionsPath), true);

        // Validasi input Ya/Tidak
        $rules = [];
        foreach ($questions as $q) {
            $rules[$q['id']] = 'required|in:Ya,Tidak';
        }
        $request->validate($rules);
        $userAnswers = $request->except('_token');

        // Bentuk user vector: key = text pertanyaan, value = 1 (Ya) atau 0 (Tidak)
        $userVector = [];
        foreach ($questions as $q) {
            $userVector[$q['text']] = $userAnswers[$q['id']] === 'Ya' ? 1 : 0;
        }

        // Data fitur Program Studi
        $majorFeatures = json_decode(file_get_contents(resource_path('data/majors.json')), true);

        // Cosine Similarity function
        $cosineSimilarity = function (array $a, array $b): float {
            $dot = 0;
            $magA = 0;
            $magB = 0;

            $keys = array_unique(array_merge(array_keys($a), array_keys($b)));

            foreach ($keys as $key) {
                $valA = $a[$key] ?? 0;
                $valB = $b[$key] ?? 0;
                $dot += $valA * $valB;
                $magA += $valA ** 2;
                $magB += $valB ** 2;
            }

            if ($magA == 0 || $magB == 0) return 0;
            return $dot / (sqrt($magA) * sqrt($magB));
        };

        // Hitung skor similarity
        $scores = [];
        foreach ($majorFeatures as $major => $features) {
            $scores[$major] = $cosineSimilarity($userVector, $features);
        }

        // Ambil 3 jurusan teratas
        arsort($scores);
        $topScores = array_slice($scores, 0, 3, true);
        
        $user = Auth::user()->name;
        $formattedTopScores = json_encode($topScores);
        $formattedUserVector = json_encode($userVector);

        $prompt = "Tugas Anda:
        Buatlah kesimpulan ringkas dan informatif berdasarkan 3 jurusan teratas yang direkomendasikan oleh sistem rekomendasi program studi. Rekomendasi ini diperoleh dari hasil kuisioner pengguna dan dihitung menggunakan metode cosine similarity dan content-based filtering.

        Tujuan Kesimpulan:
        - Memberikan pemahaman kepada pengguna mengapa 3 jurusan tersebut sesuai dengan profil dan minat mereka.
        - Menjelaskan secara singkat karakteristik masing-masing jurusan yang direkomendasikan.
        - Menunjukkan kesesuaian antara hasil kuisioner dan rekomendasi jurusan.

        Berikut adalah data yang perlu dianalisis:

        Nama Pengguna: [$user]

        Tiga Jurusan Teratas yang Direkomendasikan (beserta skor kecocokannya):
        [$formattedTopScores]

        Jawaban Pernyataan Kuisioner (dalam bentuk biner 1=Ya, 0=Tidak):
        [$formattedUserVector]

        Instruksi Penulisan:
        - Gunakan bahasa yang positif, membangun, dan mudah dipahami oleh pelajar SMA.
        - Tulis dalam 3 paragraf.
        - Tutup dengan kalimat motivasional atau ajakan agar siswa lebih yakin terhadap pilihan studinya.";

        try {
            $response = Gemini::generativeModel(model: 'gemini-1.5-flash') // Or 'gemini-1.5-pro' for more complex tasks
                            ->generateContent($prompt);
            $formattedResult = preg_replace('/\*(.*?)\*/', '<span class="font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded">$1</span>', $response->text());
            History::create([
                'user_id' => Auth::id(),
                'top_scores' => $topScores,
                'user_vector' => $userVector,
                'summary' => $formattedResult,
            ]);            
            return view('result', [
                'scores' => $topScores, 
                'formattedTopScores' => $formattedTopScores,
                'response' => $formattedResult,
            ]); 
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error communicating with Gemini API: ' . $e->getMessage()], 500);
        }
    }

    public function history(): \Illuminate\View\View
    {
        $histories = \App\Models\History::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('history', compact('histories'));
    }
}