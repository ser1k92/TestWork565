<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Interfaces\SearchRepositoryInterface;

class SearchController extends Controller
{
    public $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        $search = $request->input('search'); // Текст для поиска
        $attribute = $request->input('attribute'); // Наименование аттрибута дял сортировки
        $type = $request->input('type'); // Вид соритровки (ASC, DESC)

        $users = $this->searchRepository->search($search); // Ищем по тексту
        $result = $this->searchRepository->orderBy($users, $attribute, $type); // Сортируем

        return response()->json($result, 200);
    }

}
