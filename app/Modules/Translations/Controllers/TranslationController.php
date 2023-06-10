<?php

namespace App\Modules\Translations\Controllers;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Translations\Actions\DestroyTranslationAction;
use App\Modules\Translations\Actions\StoreTranslationAction;
use App\Modules\Translations\Actions\UpdateTranslationAction;
use App\Modules\Translations\DTO\TranslationDTO;
use App\Modules\Translations\Model\Translation;
use App\Modules\Translations\Requests\StoreTranslationRequest;
use App\Modules\Translations\Requests\UpdateTranslationRequest;
use App\Modules\Translations\ViewModels\GetAllTranslationsVM;
use App\Modules\Translations\ViewModels\GetTranslationVM;

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {

        return response()->json(Response::success((new GetAllTranslationsVM())->toArray()));
    }

    public function show(Translation $translation)
    {

        return response()->json(Response::success((new GetTranslationVM($translation))->toArray()));
    }

    public function store(StoreTranslationRequest $request)
    {

        $data = $request->validated();

        $translationDTO = TranslationDTO::fromRequest($data);

        $translation = StoreTranslationAction::execute($translationDTO);

        return response()->json(Response::success((new GetTranslationVM($translation))->toArray()));
    }

    public function update(Translation $translation, UpdateTranslationRequest $request)
    {

        $data = $request->validated();

        $translationDTO = TranslationDTO::fromRequest($data);

        $translation = UpdateTranslationAction::execute($translation, $translationDTO);

        return response()->json(Response::success((new GetTranslationVM($translation))->toArray()));
    }

    public function destroy(Translation $translation)
    {

        return response()->json(Response::success(DestroyTranslationAction::execute($translation)));
    }
}
