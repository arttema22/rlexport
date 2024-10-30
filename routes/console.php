<?php

use Illuminate\Support\Facades\Schedule;

// переодическое удаление старых записей
Schedule::command('model:prune')->daily();

// Получение токена для e1card
Schedule::command('e1card:auth')->hourly();
// Получение токена для Монополии
Schedule::command('monopoly:auth')->hourly();

// Получение данных о заправках из интеграции
Schedule::command('e1card:transaction')->everyFiveMinutes();
// Получение данных о заправках из интеграции
Schedule::command('monopoly:transaction')->everyFiveMinutes();
