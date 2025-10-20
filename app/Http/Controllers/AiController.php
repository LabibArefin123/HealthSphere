<?php

namespace App\Http\Controllers;

use App\Models\BlacklistedVisitor;
use App\Models\ChatAIData;
use App\Models\CheckInEmployee;
use App\Models\CheckOutEmployee;
use App\Models\EmergencyVisitor;
use App\Models\Employee;
use App\Models\OpenAIModel;
use App\Models\Visitor;
use App\Models\VisitorCheckin;
use App\Models\VisitorCheckout;
use App\Models\VisitorCompany;
use App\Models\VisitorGroupHostSchedule;
use App\Models\VisitorSchedule;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AiController extends Controller
{
    public function ai_chat_index()
    {
        return view('ai_chat');
    }

    public function ai_chat_response(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = strtolower($request->input('message'));

        try {
            // Friendly responses
            $greetings = [
                "hello" => "Hello! How can I assist you today?",
                "hi" => "Hi there! Need any help?",
                "hey" => "Hey! How's your day going?",
                "how are you" => "I'm just a virtual assistant, but I'm here to help! How can I assist you?",
                "what's up" => "Not much! Just here to assist you with visitor and employee management.",
                "good morning" => "Good morning! Hope you have a great day ahead!",
                "good afternoon" => "Good afternoon! What can I do for you?",
                "good evening" => "Good evening! Let me know if you need any help.",
                "thank you" => "You're welcome! Let me know if you need anything else.",
                "thanks" => "No problem! Always happy to help.",
                "bye" => "Goodbye! Have a great day!",
            ];

            foreach ($greetings as $key => $response) {
                if (str_contains($message, $key)) {
                    return response()->json([
                        'success' => true,
                        'response' => $response,
                    ]);
                }
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'AI Service is unavailable. Please try again later.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }


    public function storeChat(Request $request)
    {
        $chatId = Str::uuid(); // Generate unique chat ID
        ChatAIData::create([
            'chat_id' => $chatId,
            'chat_content' => $request->chat_content,
            'chat_date' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Chat saved successfully!', 'chat_id' => $chatId]);
    }

    public function listChats()
    {
        $chats = ChatAIData::orderBy('chat_date', 'desc')->get();
        return view('ai_chat_list', compact('chats'));
    }

    public function viewChat($id)
    {
        // Retrieve chat by ID
        $chat = ChatAIData::findOrFail($id);

        return view('ai_chat_view', compact('chat'));
    }

    public function ai_chat_pdf(Request $request)
    {
        $chatContent = $request->query('chat', 'No chat content available');

        $pdf = Pdf::loadView('ai_chat_pdf', compact('chatContent'));
        return $pdf->download('ai_chat.pdf');
    }

    public function downloadAIChatPDF($id)
    {
        $chat = ChatAIData::findOrFail($id);
        $pdf = Pdf::loadView('ai_chat_pdf', compact('chat'));
        return $pdf->download('ai_chat.pdf');
    }
}
