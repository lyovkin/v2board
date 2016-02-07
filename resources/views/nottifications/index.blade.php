@extends('layouts.app')
@section('title')
    Входящие
@stop

@section('content')
    <div class="col-md-7">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i>
                    <i class="fa fa-envelope"></i></span>Уведомления</h4>
        </div>
        @foreach($nottifications as $nottification)
            <div class="nottification" id="nottification{{ $nottification->id }}">
                <p>
                   {{-- {{dd($nottification->type)}}--}}
                    Новый комментарий
                    <a onclick="javascript:document.location.href='/{{ $nottification->type->slug  }}/{{ $nottification->obj_id  }}/?read={{ $nottification->id }}#comment{{ $nottification->comment_id}}';
                            nottification.delete({{ $nottification->id }}); return false;">
                        к {{ $nottification->type->label  }}
                    </a>
                </p>
            </div>
            <hr/>

        @endforeach
    </div>

@stop
