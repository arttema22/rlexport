<?php

use App\Models\Dir\DirRouteAddress;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dir_route_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        DirRouteAddress::create([
            // 1
            'name' => 'Авангардная',
        ]);
        DirRouteAddress::create([
            // 2
            'name' => 'Аннино',
        ]);
        DirRouteAddress::create([
            // 3
            'name' => 'Александровская горка',
        ]);
        DirRouteAddress::create([
            // 4
            'name' => 'Алтун',
        ]);
        DirRouteAddress::create([
            // 5
            'name' => 'Атрубашка',
        ]);
        DirRouteAddress::create([
            // 6
            'name' => 'Афаносово',
        ]);
        DirRouteAddress::create([
            // 7
            'name' => 'Б. Вруда',
        ]);
        DirRouteAddress::create([
            // 8
            'name' => 'Б.поля',
        ]);
        DirRouteAddress::create([
            // 9
            'name' => 'Б. Кузëмкино',
        ]);
        DirRouteAddress::create([
            // 10
            'name' => 'Бакор',
        ]);
        DirRouteAddress::create([
            // 11
            'name' => 'Бегма',
        ]);
        DirRouteAddress::create([
            // 12
            'name' => 'Белая горка',
        ]);
        DirRouteAddress::create([
            // 13
            'name' => 'Белогорка',
        ]);
        DirRouteAddress::create([
            // 14
            'name' => 'Березно',
        ]);
        DirRouteAddress::create([
            // 15
            'name' => 'Берёзка',
        ]);
        DirRouteAddress::create([
            // 16
            'name' => 'Большие Луки',
        ]);
        DirRouteAddress::create([
            // 17
            'name' => 'Брянск',
        ]);
        DirRouteAddress::create([
            // 18
            'name' => 'Будани',
        ]);
        DirRouteAddress::create([
            // 19
            'name' => 'Будилово',
        ]);
        DirRouteAddress::create([
            // 20
            'name' => 'Вак пнок Волосово',
        ]);
        DirRouteAddress::create([
            // 21
            'name' => 'Васильевско',
        ]);
        DirRouteAddress::create([
            // 22
            'name' => 'Вейно (Добручи, Гдовский р-н)',
        ]);
        DirRouteAddress::create([
            // 23
            'name' => 'Великие Луки',
        ]);
        DirRouteAddress::create([
            // 24
            'name' => 'Верест',
        ]);
        DirRouteAddress::create([
            // 25
            'name' => 'Вологда',
        ]);
        DirRouteAddress::create([
            // 26
            'name' => 'Волосово',
        ]);
        DirRouteAddress::create([
            // 27
            'name' => 'Войносолово',
        ]);
        DirRouteAddress::create([
            // 28
            'name' => 'Волхонское шоссе 6',
        ]);
        DirRouteAddress::create([
            // 29
            'name' => 'Волхонское ш.6 ( ч/з Б. Вруду )',
        ]);
        DirRouteAddress::create([
            // 30
            'name' => 'Волхонское ш.6 (ч/з Кобралово)',
        ]);
        DirRouteAddress::create([
            // 31
            'name' => 'Вруда',
        ]);
        DirRouteAddress::create([
            // 32
            'name' => 'Волхов',
        ]);
        DirRouteAddress::create([
            // 33
            'name' => 'Выборг',
        ]);
        DirRouteAddress::create([
            // 34
            'name' => 'Выра',
        ]);
        DirRouteAddress::create([
            // 35
            'name' => 'Выскатка',
        ]);
        DirRouteAddress::create([
            // 36
            'name' => 'Гродно',
        ]);
        DirRouteAddress::create([
            // 37
            'name' => 'Ганьково',
        ]);
        DirRouteAddress::create([
            // 38
            'name' => 'Гверездка',
        ]);
        DirRouteAddress::create([
            // 39
            'name' => 'Гдов',
        ]);
        DirRouteAddress::create([
            // 40
            'name' => 'Глинка',
        ]);
        DirRouteAddress::create([
            // 41
            'name' => 'Гусева гора',
        ]);
        DirRouteAddress::create([
            // 42
            'name' => 'Глубокое',
        ]);
        DirRouteAddress::create([
            // 43
            'name' => 'Городовик',
        ]);
        DirRouteAddress::create([
            // 44
            'name' => 'Гридино',
        ]);
        DirRouteAddress::create([
            // 45
            'name' => 'Данилово',
        ]);
        DirRouteAddress::create([
            // 46
            'name' => 'Дедино',
        ]);
        DirRouteAddress::create([
            // 47
            'name' => 'Дедовичи',
        ]);
        DirRouteAddress::create([
            // 48
            'name' => 'Демешкин Перевоз',
        ]);
        DirRouteAddress::create([
            // 49
            'name' => 'Демешкино',
        ]);
        DirRouteAddress::create([
            // 50
            'name' => 'Добручи',
        ]);
        DirRouteAddress::create([
            // 51
            'name' => 'Дорожная 1',
        ]);
        DirRouteAddress::create([
            // 52
            'name' => 'Дубоем',
        ]);
        DirRouteAddress::create([
            // 53
            'name' => 'Дубок',
        ]);
        DirRouteAddress::create([
            // 54
            'name' => 'Дуброво',
        ]);
        DirRouteAddress::create([
            // 55
            'name' => 'Дубяги',
        ]);
        DirRouteAddress::create([
            // 56
            'name' => 'Дорога на Металлострой 3',
        ]);
        DirRouteAddress::create([
            // 57
            'name' => 'Елемно',
        ]);
        DirRouteAddress::create([
            // 58
            'name' => 'Егорьевск',
        ]);
        DirRouteAddress::create([
            // 59
            'name' => 'Елизаветино',
        ]);
        DirRouteAddress::create([
            // 60
            'name' => 'Жадрицы',
        ]);
        DirRouteAddress::create([
            // 61
            'name' => 'Жилино',
        ]);
        DirRouteAddress::create([
            // 62
            'name' => 'Жуково (Гдов)',
        ]);
        DirRouteAddress::create([
            // 63
            'name' => 'Журавлев конец',
        ]);
        DirRouteAddress::create([
            // 64
            'name' => 'Завердужье',
        ]);
        DirRouteAddress::create([
            // 65
            'name' => 'Загорье',
        ]);
        DirRouteAddress::create([
            // 66
            'name' => 'Заклинье',
        ]);
        DirRouteAddress::create([
            // 67
            'name' => 'Замежье',
        ]);
        DirRouteAddress::create([
            // 68
            'name' => 'Замошье (кусты)',
        ]);
        DirRouteAddress::create([
            // 69
            'name' => 'Заовражье',
        ]);
        DirRouteAddress::create([
            // 70
            'name' => 'Заплюсье',
        ]);
        DirRouteAddress::create([
            // 71
            'name' => 'Заручье',
        ]);
        DirRouteAddress::create([
            // 72
            'name' => 'Заяцково',
        ]);
        DirRouteAddress::create([
            // 73
            'name' => 'Зуево',
        ]);
        DirRouteAddress::create([
            // 74
            'name' => 'Ивангород',
        ]);
        DirRouteAddress::create([
            // 75
            'name' => 'Ивановское',
        ]);
        DirRouteAddress::create([
            // 76
            'name' => 'Идрица',
        ]);
        DirRouteAddress::create([
            // 77
            'name' => 'Идрица-Пустошка(Пск.Обл)',
        ]);
        DirRouteAddress::create([
            // 78
            'name' => 'Инок Волосово',
        ]);
        DirRouteAddress::create([
            // 79
            'name' => 'Исаково Псковской. Обл.',
        ]);
        DirRouteAddress::create([
            // 80
            'name' => 'Игоревская',
        ]);
        DirRouteAddress::create([
            // 81
            'name' => 'Калливере',
        ]);
        DirRouteAddress::create([
            // 82
            'name' => 'Кательский',
        ]);
        DirRouteAddress::create([
            // 83
            'name' => 'Кезелево(Гатчин. р-н)',
        ]);
        DirRouteAddress::create([
            // 84
            'name' => 'Камено',
        ]);
        DirRouteAddress::create([
            // 85
            'name' => 'Карьер',
        ]);
        DirRouteAddress::create([
            // 86
            'name' => 'Кингисепп',
        ]);
        DirRouteAddress::create([
            // 87
            'name' => 'Клуколова',
        ]);
        DirRouteAddress::create([
            // 88
            'name' => 'Комсомольское ш',
        ]);
        DirRouteAddress::create([
            // 89
            'name' => 'Красные Борки',
        ]);
        DirRouteAddress::create([
            // 90
            'name' => 'Княжево',
        ]);
        DirRouteAddress::create([
            // 91
            'name' => 'Кобралово',
        ]);
        DirRouteAddress::create([
            // 92
            'name' => 'Ковалёво',
        ]);
        DirRouteAddress::create([
            // 93
            'name' => 'Кузëмкино',
        ]);
        DirRouteAddress::create([
            // 94
            'name' => 'Куровицы',
        ]);
        DirRouteAddress::create([
            // 95
            'name' => 'Кривко',
        ]);
        DirRouteAddress::create([
            // 96
            'name' => 'Крюки',
        ]);
        DirRouteAddress::create([
            // 97
            'name' => 'Колпинское шоссе 38 ',
        ]);
        DirRouteAddress::create([
            // 98
            'name' => 'Коммунар Строителей 3',
        ]);
        DirRouteAddress::create([
            // 99
            'name' => 'Комсомольское ш. д.13',
        ]);
        DirRouteAddress::create([
            // 100
            'name' => 'Котлы',
        ]);
        DirRouteAddress::create([
            // 101
            'name' => 'Кошкино Парк',
        ]);
        DirRouteAddress::create([
            // 102
            'name' => 'Красногородск',
        ]);
        DirRouteAddress::create([
            // 103
            'name' => 'Красный Бор',
        ]);
        DirRouteAddress::create([
            // 104
            'name' => 'Левашово',
        ]);
        DirRouteAddress::create([
            // 105
            'name' => 'Лебяжье',
        ]);
        DirRouteAddress::create([
            // 106
            'name' => 'Лесное',
        ]);
        DirRouteAddress::create([
            // 107
            'name' => 'Лисино-Корпус',
        ]);
        DirRouteAddress::create([
            // 108
            'name' => 'Ломоносов',
        ]);
        DirRouteAddress::create([
            // 109
            'name' => 'Луга',
        ]);
        DirRouteAddress::create([
            // 110
            'name' => 'Лужицы',
        ]);
        DirRouteAddress::create([
            // 111
            'name' => 'Лужицы (ч/з Б.Вруду)',
        ]);
        DirRouteAddress::create([
            // 112
            'name' => 'Лучки',
        ]);
        DirRouteAddress::create([
            // 113
            'name' => 'Липы',
        ]);
        DirRouteAddress::create([
            // 114
            'name' => 'Лисий нос',
        ]);
        DirRouteAddress::create([
            // 115
            'name' => 'Лопец',
        ]);
        DirRouteAddress::create([
            // 116
            'name' => 'Любочажье',
        ]);
        DirRouteAddress::create([
            // 117
            'name' => 'Любытино',
        ]);
        DirRouteAddress::create([
            // 118
            'name' => 'Максютино',
        ]);
        DirRouteAddress::create([
            // 119
            'name' => 'Малый Луцк',
        ]);
        DirRouteAddress::create([
            // 120
            'name' => 'Малышева гора',
        ]);
        DirRouteAddress::create([
            // 121
            'name' => 'Медвежек',
        ]);
        DirRouteAddress::create([
            // 122
            'name' => 'Мозули',
        ]);
        DirRouteAddress::create([
            // 123
            'name' => 'Моклочно',
        ]);
        DirRouteAddress::create([
            // 124
            'name' => 'Монастырёк',
        ]);
        DirRouteAddress::create([
            // 125
            'name' => 'Московское шоссе 235 литер л',
        ]);
        DirRouteAddress::create([
            // 126
            'name' => 'Мурино',
        ]);
        DirRouteAddress::create([
            // 127
            'name' => 'Мшинская',
        ]);
        DirRouteAddress::create([
            // 128
            'name' => 'Мышкино',
        ]);
        DirRouteAddress::create([
            // 129
            'name' => 'Невель',
        ]);
        DirRouteAddress::create([
            // 130
            'name' => 'Негуба',
        ]);
        DirRouteAddress::create([
            // 131
            'name' => 'Неёлово',
        ]);
        DirRouteAddress::create([
            // 132
            'name' => 'Новгород',
        ]);
        DirRouteAddress::create([
            // 133
            'name' => 'Новое Девяткино',
        ]);
        DirRouteAddress::create([
            // 134
            'name' => 'Новоселье',
        ]);
        DirRouteAddress::create([
            // 135
            'name' => 'Новоселье (Псковская обл)',
        ]);
        DirRouteAddress::create([
            // 136
            'name' => 'Новоселье (Струги)',
        ]);
        DirRouteAddress::create([
            // 137
            'name' => 'Новоржев',
        ]);
        DirRouteAddress::create([
            // 138
            'name' => 'Овсище',
        ]);
        DirRouteAddress::create([
            // 139
            'name' => 'Окуловка',
        ]);
        DirRouteAddress::create([
            // 140
            'name' => 'Опочка',
        ]);
        DirRouteAddress::create([
            // 141
            'name' => 'Осьмино',
        ]);
        DirRouteAddress::create([
            // 142
            'name' => 'Партизанская 14',
        ]);
        DirRouteAddress::create([
            // 143
            'name' => 'Подозванье',
        ]);
        DirRouteAddress::create([
            // 144
            'name' => 'Полна',
        ]);
        DirRouteAddress::create([
            // 145
            'name' => 'Порхов',
        ]);
        DirRouteAddress::create([
            // 146
            'name' => 'Посёлок Новый',
        ]);
        DirRouteAddress::create([
            // 147
            'name' => 'Посёлок Плюсса',
        ]);
        DirRouteAddress::create([
            // 148
            'name' => 'Потрехново',
        ]);
        DirRouteAddress::create([
            // 149
            'name' => 'Псков',
        ]);
        DirRouteAddress::create([
            // 150
            'name' => 'Псков (ул.Декабристов)',
        ]);
        DirRouteAddress::create([
            // 151
            'name' => 'Псков Леона Поземского',
        ]);
        DirRouteAddress::create([
            // 152
            'name' => 'Псков(Новаторов3г)',
        ]);
        DirRouteAddress::create([
            // 153
            'name' => 'Пустомержское поселения',
        ]);
        DirRouteAddress::create([
            // 154
            'name' => 'Пушкин Тярлево',
        ]);
        DirRouteAddress::create([
            // 155
            'name' => 'Р.Верца',
        ]);
        DirRouteAddress::create([
            // 156
            'name' => 'Разбегаево',
        ]);
        DirRouteAddress::create([
            // 157
            'name' => 'Ремонтников 1',
        ]);
        DirRouteAddress::create([
            // 158
            'name' => 'Реполка',
        ]);
        DirRouteAddress::create([
            // 159
            'name' => 'Рудница',
        ]);
        DirRouteAddress::create([
            // 160
            'name' => 'Рудно',
        ]);
        DirRouteAddress::create([
            // 161
            'name' => 'Рыбацкий пр 3',
        ]);
        DirRouteAddress::create([
            // 162
            'name' => 'Сабск',
        ]);
        DirRouteAddress::create([
            // 163
            'name' => 'Сара-Лог',
        ]);
        DirRouteAddress::create([
            // 164
            'name' => 'Сельхозтехника (СХТ)',
        ]);
        DirRouteAddress::create([
            // 165
            'name' => 'Сергеиха',
        ]);
        DirRouteAddress::create([
            // 166
            'name' => 'Серебрянский',
        ]);
        DirRouteAddress::create([
            // 167
            'name' => 'Середка',
        ]);
        DirRouteAddress::create([
            // 168
            'name' => 'Сертолово',
        ]);
        DirRouteAddress::create([
            // 169
            'name' => 'Сестрорецк',
        ]);
        DirRouteAddress::create([
            // 170
            'name' => 'Симонова 15',
        ]);
        DirRouteAddress::create([
            // 171
            'name' => 'Славянка',
        ]);
        DirRouteAddress::create([
            // 172
            'name' => 'Славянская',
        ]);
        DirRouteAddress::create([
            // 173
            'name' => 'Сланцы',
        ]);
        DirRouteAddress::create([
            // 174
            'name' => 'Слипченко',
        ]);
        DirRouteAddress::create([
            // 175
            'name' => 'Смоленец',
        ]);
        DirRouteAddress::create([
            // 176
            'name' => 'Сольцы Новгородская обл',
        ]);
        DirRouteAddress::create([
            // 177
            'name' => 'Сортавала',
        ]);
        DirRouteAddress::create([
            // 178
            'name' => 'Сосново',
        ]);
        DirRouteAddress::create([
            // 179
            'name' => 'Сосновый Бор',
        ]);
        DirRouteAddress::create([
            // 180
            'name' => 'СПб, Лесопарковая 15',
        ]);
        DirRouteAddress::create([
            // 181
            'name' => 'Ст. Сланцы',
        ]);
        DirRouteAddress::create([
            // 182
            'name' => 'Стаи',
        ]);
        DirRouteAddress::create([
            // 183
            'name' => 'Старополье',
        ]);
        DirRouteAddress::create([
            // 184
            'name' => 'Струги Красные',
        ]);
        DirRouteAddress::create([
            // 185
            'name' => 'Тëсово-Нетыльское',
        ]);
        DirRouteAddress::create([
            // 186
            'name' => 'Тамегонт',
        ]);
        DirRouteAddress::create([
            // 187
            'name' => 'Угольная гавань',
        ]);
        DirRouteAddress::create([
            // 188
            'name' => 'Уйсолово',
        ]);
        DirRouteAddress::create([
            // 189
            'name' => 'Ул.ремонтников 1',
        ]);
        DirRouteAddress::create([
            // 190
            'name' => 'Усть-Ижора',
        ]);
        DirRouteAddress::create([
            // 191
            'name' => 'Усть-Луга',
        ]);
        DirRouteAddress::create([
            // 192
            'name' => 'Цапелька',
        ]);
        DirRouteAddress::create([
            // 193
            'name' => 'Цесла',
        ]);
        DirRouteAddress::create([
            // 194
            'name' => 'Черенское',
        ]);
        DirRouteAddress::create([
            // 195
            'name' => 'Чернëво',
        ]);
        DirRouteAddress::create([
            // 196
            'name' => 'Чернецово',
        ]);
        DirRouteAddress::create([
            // 197
            'name' => 'Чудиново',
        ]);
        DirRouteAddress::create([
            // 198
            'name' => 'Чудово',
        ]);
        DirRouteAddress::create([
            // 199
            'name' => 'Шавково',
        ]);
        DirRouteAddress::create([
            // 200
            'name' => 'Шакицы',
        ]);
        DirRouteAddress::create([
            // 201
            'name' => 'Шовково',
        ]);
        DirRouteAddress::create([
            // 202
            'name' => 'Шушары',
        ]);
        DirRouteAddress::create([
            // 203
            'name' => 'Яблонька',
        ]);
        DirRouteAddress::create([
            // 204
            'name' => 'Язвище',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dir_route_addresses');
    }
};
