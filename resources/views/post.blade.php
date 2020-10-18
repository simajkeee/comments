@extends('layout')
@section('styles')
    <link rel="stylesheet" href="/css/comment.css">
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div id="app">
                    <div class="comments__wrapper">
                        <div class="comments__headline">
                            <h3>Комментарии</h3>
                        </div>
                        <div class="comments__sorting">
                            <ul class="sorting">
                                <li>Популярные</li>
                                <li>Новые</li>
                                <li>Старые</li>
                            </ul>
                        </div>
                        <comments-list
                            :post="post"
                            :tree-comments="treeComments"
                            :collection="treeComments.root"></comments-list>
                    </div>
                    <div class="comments-form__wrapper">
                        <h3>Leave the comment</h3>
                        <add-comment :post="post"></add-comment>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
