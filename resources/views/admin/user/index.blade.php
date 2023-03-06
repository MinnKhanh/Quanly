@extends('layouts.admin')
@section('content')
    @if ($errors->has('msg'))
        <div class="error">{{ $errors->first('msg') }}</div>
    @endif
    <div>
        <div class="d-flex mb-5">
        </div>
        <div class="container-fluid" style="overflow-x: scroll;">
            <table class="table w-100">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center"></th>
                        <th scope="col" class="text-center">Nhân viên</th>
                        <th scope="col" class="text-center">Chức vụ</th>
                        <th scope="col" class="text-center">Tên tài khoản</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="fix text-center">Quyền</th>
                        <th scope="col" class="fix text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $roles = App\Models\Role::pluck('name', 'id')->toArray();
                    @endphp
                    @forelse ($users as $item)
                        <tr>
                            <td scope="col" class="text-center align-middle"><input type="checkbox"
                                    value="{{ $item['id'] }}" class="check">
                            </td>
                            <td scope="col" class="text-center align-middle" class="text-center">
                                {{ !empty($item['employee']) > 0 ? $item['employee']['name'] : 'tự do' }}
                            </td>
                            <td scope="col" class="text-center align-middle" class="text-center">
                                {{ !empty($item['employee']) > 0 ? $item['employee']['position']['name'] : 'tự do' }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['name'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['email'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                @foreach ($item['roles'] as $item)
                                    {{ $item['name'] }}
                                @endforeach
                            </td>
                            <td scope="col" class="text-center d-flex justify-content-center">
                                <form action="{{ route('admin.user.delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <button type="button" disabled class="btn btn-primary" id="reset">Reset Mật khẩu</button>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                {{-- @if (count($customers) > 0)
                    {{ $customers->links() }}
                @endif --}}

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.check', function() {
                $('#reset').attr('disabled', $(".check:checked").length ? false : true);

            })
            $('#reset').click(function() {
                let datas = []
                console.log('chay nah mois')
                $('.check:checked').each(function() {
                    datas.push(parseInt(this.value));
                });

                $.ajax({
                    url: "{{ route('admin.user.reset_password') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        listId: datas
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        console.log('ddd', response)
                    },
                    error: function(response) {
                        console.log(response)
                        Swal.fire({
                            icon: 'error',
                            title: 'Thất bại',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function(data) {
                        $('.check').prop('checked', false)
                        $('#reset').attr('disabled', true);
                    }
                });
            })
        })
    </script>
@endpush
