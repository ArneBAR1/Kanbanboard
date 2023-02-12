<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use App\Models\boardColumn;
use App\Http\Resources\V1\BoardResource;

class BoardController extends Controller
{

    public function index()
    {
        return BoardResource::Collection(boardColumn::all());
    }

    public function show(BoardColumn $board)
    {
        return new BoardResource($board);
    }

    public function store(BoardRequest $request)
    {
        boardColumn::create($request->validated());
        return response()->json("Board created.");
    }

    public function update(BoardRequest $request, boardColumn $board)
    {
        $board->update($request->validated());
        return response()->json("Board updated.");
    }

    public function destroy(boardColumn $board)
    {
        $board->delete();
        return response()->json("Board deleted");
    }
}
