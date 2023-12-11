<div class="modal fade" id="redirect-login-signup" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
    <form action="{{ route("sell.property.store") }}" method="POST" enctype="multipart/form-data" id="sellPropertyRequest">
        @csrf
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="addProductModal">You need to login first</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-auto">
                        <div class="col-6">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('register') }}" class="btn btn-warning">Signup</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Create sell request</button>
                </div> --}}
            </div>
        </div>
    </form>
</div>

@push('styles')
    <style>
        .col-2 {
            display: flex;
            align-items: center;
        }

        .btn-group {
            display: flex;
            gap: 5px;
            margin-top:30px!important;
        }
    </style>
@endpush
