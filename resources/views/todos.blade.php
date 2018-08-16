@extends('layout')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                  <form class="form-inline" action="/create/todo" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <input type="text" class="form-control input-lg" name="todo" placeholder="Todo item">
                        </div>
                        <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                              <input class="form-control" name="deadline" type="text" readonly />
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Todo</button>

                  </form>
            </div>
      </div>
      <hr>

      @foreach($todos as $todo)
            {{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"> x </a>

            <?php

            $expired = false;
            $date_now = date("Y-m-d");
            if ($date_now > $todo->deadline) {
                $expired = true;
            }
            if($expired) {
            ?>
                  <span class="text-success">Expired!</span>
                  <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info btn-xs"> Re open </a>
            <?php
            } else if(!$todo->completed) {
            ?>
                  <a href="{{ route('todos.completed', [ 'id' => $todo->id ]) }}" class="btn btn-xs btn-success"> Mark as completed</a>
            <?php
            } else {
            ?>
                <span class="text-success">Completed!</span>
            <?php
            }
            ?>


            {{ $todo->deadline }}
            <hr>
      @endforeach
@stop
