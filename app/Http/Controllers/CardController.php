<?php

namespace App\Http\Controllers;

use App\Card;
use App\Seen;

class CardController extends Controller
{

    function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function getCards()
    {


        $arr = Seen::where('id', 1)->pluck('user_seen')->first();


        $cardsNotSeen = Card::whereNotIn('id', $arr)->get();

        return $this->unique_multidim_array($cardsNotSeen, 'type_id');

        //return $cardsNotSeen;

       /* $cards = Card::all()->random(4);
        return $cards;

        $cards = Card::where('id', '>=', 1)->take(4)->get();
        foreach ($cards as $card) {
            $arr['response'][] = ['card_id' => $card->id,
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
            ];

        }

        return response()->json($arr);*/

        /*try
        {
            $card = Card::findOrFail($id);
        }

        catch(ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Card not found',
            ], 404);
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
        ], 200);*/

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
