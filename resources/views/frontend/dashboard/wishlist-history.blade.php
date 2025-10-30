@extends('frontend.layouts.account')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
        <h4 class="page-main-title">Wishlist History</h4>
        <hr>
        <div class="wishlist-history-search-input-container bg-transparent my-3">
            <input type="search" id="wishlistSearch" class="form-control bg-transparent" placeholder="Search" />
        </div>
        <table id="wishlistTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Number</th>
                    <th class="text-center">Wishlist Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="text-center">1</td>
                    <td class="w-75">Jigar-10-23-2024</td>
                    <td class="text-center">
                        <div class="edit-wishlist-data-mobile-btn bg-transparent">
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-pen-to-square bg-transparent"></i></button>
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-eye bg-transparent"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="w-75">Jigar-10-23-2024</td>
                    <td class="text-center">
                        <div class="edit-wishlist-data-mobile-btn bg-transparent">
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-pen-to-square bg-transparent"></i></button>
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-eye bg-transparent"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="w-75">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum tempore
                        aspernatur porro nam tempora corporis, vel harum! Magni, obcaecati?</td>
                    <td class="text-center">
                        <div class="edit-wishlist-data-mobile-btn bg-transparent">
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-pen-to-square bg-transparent"></i></button>
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-eye bg-transparent"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="w-75">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, corporis?</td>
                    <td class="text-center">
                        <div class="edit-wishlist-data-mobile-btn bg-transparent">
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-pen-to-square bg-transparent"></i></button>
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-eye bg-transparent"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td class="w-75">Jigar-10-23-2024</td>
                    <td class="text-center">
                        <div class="edit-wishlist-data-mobile-btn bg-transparent">
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-pen-to-square bg-transparent"></i></button>
                            <button class="btn btn-sm edit-wishlist-table-btn"><i
                                    class="fa-solid fa-eye bg-transparent"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('wishlistSearch');
            const table = document.getElementById('wishlistTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            searchInput.addEventListener('input', function() {
                const filter = this.value.toLowerCase();

                Array.from(rows).forEach(row => {
                    const cells = row.getElementsByTagName('td');
                    const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase())
                        .join(' ');

                    if (rowText.includes(filter)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
