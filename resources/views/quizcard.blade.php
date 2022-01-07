@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Quiz Cards</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <button class="btn btn-success" id="btn-add">
                    Add Quiz Card
                </button>
            </div>
        </div>

        <div>
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>Deck</th>
                    <th>Parent</th>
                    <th>Type</th>
                    <th>Text 1</th>
                    <th>Text 2</th>
                </tr>
                </thead>
                <tbody id="quizcard-list" name="quizcardsli-st">
                @foreach ($quizcard as $data)
                    <tr id="quizcard{{$data->id}}">
                        <td>{{$data->deck}}</td>
                        <td>{{$data->parent}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->data_string_1}}</td>
                        <td>{{$data->data_string_2}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Create Quiz Card</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label>deck</label>
                                    <input type="text" class="form-control" id="deck" name="deck"
                                           placeholder="Enter Deck Name" value="">
                                </div>

                                <div class="form-group">
                                    <label>Parent</label>
                                    <input type="text" class="form-control" id="parent" name="parent"
                                           placeholder="Enter Parent" value="">
                                </div>

                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                           placeholder="Enter Type" value="">
                                </div>

                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" class="form-control" id="data_string_1" name="data_string_1"
                                           placeholder="Enter Question" value="">
                                </div>

                                <div class="form-group">
                                    <label>Answer</label>
                                    <input type="text" class="form-control" id="data_string_2" name="data_string_2"
                                           placeholder="Enter Answer" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="quizcard_id" name="quizcard_id" value="1">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
