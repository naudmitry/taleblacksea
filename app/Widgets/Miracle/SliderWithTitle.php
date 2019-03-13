<?php

namespace App\Widgets\Miracle;

use Validator;

class SliderWithTitle extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
            'items' => [],
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator|null
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'items.*.title' => 'required|string',
                'items.*.subtitle' => 'required|string',
                'items.*.image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок',
                'subtitle' => 'Введите подзаголовок',
                'items.*.title' => 'Введите заголовок слайда',
                'items.*.subtitle' => 'Введите подзаголовок слайда',
                'items.*.image_link' => 'Введите ссылку картинки для слайда.',
            ]);
    }
}