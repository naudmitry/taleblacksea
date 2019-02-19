<?php

namespace App\Widgets\Miracle;

use Validator;

class CallOutBox extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'link' => '',
            'button' => ''
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|max:50',
                'link' => 'required|string',
                'button' => 'required|string'
            ],
            [],
            [
                'title' => 'Введите название.',
                'link' => 'Введите ссылку.',
                'button' => 'Введите надпись для кнопки.'
            ]);
    }
}