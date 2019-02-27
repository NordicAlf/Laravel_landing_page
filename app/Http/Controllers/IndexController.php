<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use DB;
use Mail;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
      // Если отправлен пост-запрос
      if ($request->isMethod('post')){

        // Ошибки на случай, если неправильно введены данные
        $messages = [
          'required' => 'Поле :attribute обязательно к заполнению',
          'max:255' => 'Максимальная длинна :attribute не должна превышать 20 символов',
          'email' => 'Поле :attribute должно соответствовать email адресу'
        ];

        // Валидация данных из формы
        $this->validate($request, [
          'name' => 'required|max:20',
          'email' => 'required|email',
          'text' => 'required'
        ], $messages);

        $data = $request->all();
        //dd($data);
        // Отправка сообщения из данных формы
        $result = Mail::send('site.email', ['data'=>$data], function($message) use ($data) {
          // Почта куда приходят письма
          $mailAdmin = env('MAIL_ADMIN');
          // Данные для отправки
          $message->from($data['email'], $data['name']);
          // Куда отправить и название темы
          $message->to($mailAdmin)->subject('Question');
        });

        if ($result) {
          return redirect()->route('home')->with('status', 'Email is send');
        }

      }

      $pages = Page::all();
      $peoples = People::all();
      $portfolios = Portfolio::all();
      $services = Service::all();
      // Формирование тэгов для портфолио
      $tags = DB::table('portfolios')->distinct()->pluck('filter');

      // Страницы из базы данных
      $menu = array();
      foreach ($pages as $page) {
        $item = array('title'=>$page->name, 'alias'=>$page->alias);
        array_push($menu, $item);
      }

      // Пункты меню в хэдере, кроме страниц из базы данных
      $itemsMenu = ['Стек'=>'service', 'Портфолио'=>'Portfolio','Контакты'=>'contact'];

      foreach ($itemsMenu as $title => $alias) {
        $item = array('title'=>$title, 'alias'=>$alias);
        array_push($menu,$item); // Добавляет пункт меню в конец массива
      }
      return view('site.index', ['menu'=>$menu, 'pages'=>$pages, 'services'=>$services,
                                'portfolios'=>$portfolios, 'peoples'=>$peoples,
                                'tags'=>$tags]);
    }
}
