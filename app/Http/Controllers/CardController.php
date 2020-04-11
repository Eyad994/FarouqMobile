<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function getCard($id)
    {
        try
        {
            $card = Card::findOrFail($id);
        }

        catch(ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Card not found',
                'status' => 404
            ]);
        }

        return response()->json([
            'card_id' => $card->id,
            'content' => $card->content,
            'content_description' => $card->content_description,
            'is_favorite' => $card->is_favorite == 0 ? false : true,
            'category' => [
                'id' => $card->category->id,
                'name' => $card->category->name
            ],
            'type' => [
                'id' => $card->type->id,
                'name' => $card->type->name,
            ],
            'header' => [
                'text_en' => $card->header_en,
                'text_ar' => $card->header_ar
            ],
            'footer' => [
                'text_en' => $card->footer_en,
                'text_ar' => $card->footer_ar
            ],
            'background_color' => [
                'background_color' => $card->background_color,
                'dark_background_color' => $card->dark_background_color
            ],
        ], 200);

        /*Card::create([
           'content' => 'text content',
            'content_description' => 'content description',
            'is_favorite' => 1,
            'category_id' => 2,
            'type_id' => 2,
            'background_color' => 'Background color',
            'dark_background_color' => 'Dark theme background color'
        ]);*/

    }
}
