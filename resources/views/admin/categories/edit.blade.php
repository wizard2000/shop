@extends('admin.layout.master')
@section('headerStyle')

    <!-- Select2 -->
    <link rel="stylesheet" href="/admin/plugins/vendor_components/select2/dist/css/select2.min.css">
@endsection
@section('mainContent')
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-6"><h3 class="box-title">ویرایش دسته بندی </h3></div>
                <div class="col-6 text-left"><a href="{{route('categories.index')}}" class="text-info">لیست دسته بندی ها</a>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form class="form-horizontal form-element" method="post"
                                  action="{{route('categories.update' , $category)}}">
                                @method('PATCH')
                                <div class="box-body">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" placeholder="title" name="title"
                                                   value="{{$category->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parent" class="col-sm-2 control-label">انتخاب دسته بندی مادر</label>

                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select class="form-control" id="parent" name="category_id">
                                                    <option disabled selected>دسته بندی مادر را انتخاب کنید...</option>
                                                    @foreach($categories as $cat)
                                                        @if($cat->id != $category->id && !in_array($cat->id , $children_id))
                                                            <option value="{{$cat->id}}"
                                                                    @if($cat->id == $category->category_id )
                                                                    selected
                                                                @endif
                                                            >{{$cat->title}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div>
                                    @csrf
                                </div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-info" value="ثبت" id="submit">
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                        <div class="col-md-2 ">
                            <h4>لیست زیر مجموعه ها</h4>
                            @if(count($category->children)>0)
                                <ul>
                                    @foreach($category->children as $child)
                                        <li>{{$child->title}}</li>
                                    @endforeach
                                </ul>
                            @else
                                <ul>
                                    <li>این دسته بندی زیرمجموعه ندارد</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footerScript')
    <!-- Bootstrap Select -->
    <script src="/admin/plugins/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <!-- Select2 -->
    <script src="/admin/plugins/vendor_components/select2/dist/js/select2.full.js"></script>
@endsection
