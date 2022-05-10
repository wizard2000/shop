@extends('admin.layout.master')

@section('mainContent')
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-6"><h3 class="box-title">لیست دسته بندی ها</h3></div>
                <div class="col-6 text-left"><a href="{{route('categories.create')}}" class="text-info">افزودن دسته بندی
                        جدید</a></div>

            </div>
        </div>
        <!-- /.box-header -->
        @if(count($categories)>0)
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">دسته مادر</th>
                            <th class="text-center">تعداد محصول</th>
                            <th class="text-center">ویرایش</th>
                            <th class="text-center">حذف</th>
                            <th class="text-center">مشاهده</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                            <td class="text-center">{{$category->id}}</td>
                            <td class="text-center">{{$category->title}}</td>
                            <td class="text-center"> {{optional($category->parent)->title}}</td>
                            <td class="text-center">123</td>
                            <td class="text-center"><a href="/ts-admin/categories/{{$category->id}}/edit" class="text-info p-2"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td class="text-center">
                                    <form action="{{route('categories.destroy',$category)}}" method="post" class="">
                                        @csrf
                                        @method('DELETE')
                                        <label for="delete"><span class="glyphicon glyphicon-trash"></span></label>
                                        <input type="submit" class="border-0 text-danger " value="حذف" id="delete">
                                    </form>
                                </td>
                            <td class="text-center"><a href="/categories/" class="text-primary p-2" target="_blank"><span
                                        class="glyphicon glyphicon-eye-open"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>عنوان</th>
                            <th>والد</th>
                            <th colspan="4"></th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @else
            <div class="box-body">
                <p class="text-center text-bold">دسته بندی وجود ندارد</p>
            </div>
    @endif
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection

@section('footerScript')
    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>
@endsection
