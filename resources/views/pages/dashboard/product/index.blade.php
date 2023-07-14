<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            var datatable = $('#crudTable').dataTable(
                {
                    ajax : {
                        url : '{!! url()->current() !!}'
                    },
                    columns : [
                        {
                            data: 'id',
                            name: 'id',
                            width:'5%',
                        },
                        {
                            data:'title',
                            name : 'title',
                        },
                        {
                            data:'price',
                            name: 'price'
                        },
                        {
                            data:'qty',
                            name:'qty'
                        },
                        {
                            data:'action',
                            name:'action',
                            orderable:false,
                            searchable:false,
                            width: '25%'
                        }
                    ]
                }
            )
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-10">
                    <a href="{{route('dashboard.product.create')}}" class="bg-pink-400 hover:bg-white hover:text-pink-500 text-white font-bold py-2 px-4 rounded shadow-lg">+ Create Data Produk</a>
                </div> 
                <div class="shadow overflow sm-rounded md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <table id="crudTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
         </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</x-app-layout>
