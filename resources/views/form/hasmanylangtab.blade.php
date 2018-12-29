<style>
    .nav-tabs > li:hover > i{
        display: inline;
    }
    .close-tab {
        position: absolute;
        font-size: 10px;
        font-size: 10px;
        top: 2px;
        right: 5px;
        color: #94A6B0;
        cursor: pointer;
        display: none;
    }
</style>
<div id="has-many-{{$column}}" class="nav-tabs-custom has-many-{{$column}}">
    <div class="row header">
        <div class="col-md-12"><h4 class="pull-right">{{ $label }}</h4></div>
    </div>

    <hr style="margin-top: 0px;">

    <ul class="nav nav-tabs">

        @foreach(Config::get('app.locales') as $key => $locale)
            <li class="@if ($key == 0)) active @endif ">
                <a href="#{{ $relationName . '_' . $key }}" data-toggle="tab">
                    {{ $locale }}
                </a>

            </li>
        @endforeach

    </ul>

    <div class="tab-content has-many-{{$column}}-forms">

        @foreach(Config::get('app.locales') as $pk => $locale)

            <div class="tab-pane fields-group has-many-{{$column}}-form @if ($pk == 0) active @endif" id="{{ $relationName . '_' . $pk }}">
                @php
                $forms = array_values($forms);

                @endphp
                @if (isset($forms[$pk]))
                    @foreach($forms[$pk]->fields() as $field)
                        @php //dd($field); @endphp
                        {!! $field->render() !!}
                    @endforeach

                @else
                    @foreach($template_fields as $field)
                        @php
                            $field->setElementName($column.'['. $pk .'][' .$field->column() .']');
                            $field->attribute('name',$column.'['. $pk .'][' .$field->column() .']');
                            $field->attribute('title',$field->column());

                        @endphp
                        {!! $field->render() !!}
                    @endforeach
                    <input type="hidden" name="locales[{{ $pk }}][lang_id]" value ="{{ $pk }}">
                @endif
            </div>
        @endforeach
    </div>

    <template class="nav-tab-tpl">
        <li class="new">
            <a href="#{{ $relationName . '_new_' . \Encore\Admin\Form\NestedForm::DEFAULT_KEY_NAME }}" data-toggle="tab">
                &nbsp;New {{ \Encore\Admin\Form\NestedForm::DEFAULT_KEY_NAME }} <i class="fa fa-exclamation-circle text-red hide"></i>
            </a>
            <i class="close-tab fa fa-times" ></i>
        </li>
    </template>
    <template class="pane-tpl">
        <div class="tab-pane fields-group new" id="{{ $relationName . '_new_' . \Encore\Admin\Form\NestedForm::DEFAULT_KEY_NAME }}">
            {!! $template !!}
        </div>
    </template>

</div>