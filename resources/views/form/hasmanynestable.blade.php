

<div class="row">
    <div class="col-md-12"><h4 class="pull-right">{{ $label }}</h4></div>
    <div class="col-md-12"></div>
</div>

<hr style="margin-top: 0px;">

<div id="has-many-{{$column}}" class="has-many-{{$column}} dd">
    <ol class="dd-list has-many-{{$column}}-forms">

        @foreach($forms as $pk => $form)
            <li class="dd-item" data-id="{{$pk}}">
                <span class="dd-content-view"><i class="fa fa-bars"></i></span>
                <div class="dd-handle" data-id="{{$pk}}">
                    {!! $form->fields()[1]->render()!!}
                </div>
                <div class="dd-content collapse" data-id="{{$pk}}">
                    <div class="has-many-{{$column}}-form fields-group ">
                        @foreach($form->fields() as $field)
                            {!! $field->render() !!}
                        @endforeach

                        <div class="form-group">
                            <label class="col-sm-12 control-label"></label>
                            <div class="col-sm-12">
                                <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash">&nbsp;</i>{{ trans('admin::lang.remove') }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </li>
        @endforeach
    </ol>

    <template class="{{$column}}-tpl">
        <li class="dd-item" data-id="0">
            <span class="dd-content-view"><i class="fa fa-bars"></i></span>
            <div class="dd-handle">
                новый блок
            </div>
            <div class="dd-content collapse">
                <div class="has-many-{{$column}}-form fields-group">
                    {!! $template !!}
                    <div class="form-group">
                        <label class="col-sm-12 control-label"></label>
                        <div class="col-sm-12">
                            <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;{{ trans('admin::lang.remove') }}</div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </li>
    </template>

    <div class="form-group" style="margin-top: 15px;">
        <label class="col-sm-12 control-label"></label>
        <div class="col-sm-12">
            <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;{{ trans('admin::lang.new') }}</div>
        </div>
    </div>

</div>

<style>
    .dd-content-view{
        display: block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 25px;
        height: 20px;
        margin: 5px 0;
        padding: 0;
        top:8px;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
    }

    .dd-item .fields-group{
        border: 1px solid #ddd;
        padding: 15px;
    }
</style>