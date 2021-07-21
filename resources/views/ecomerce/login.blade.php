<div class="modal fade login-modal" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 class="modal-title">log in</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{route('auth')}}" method="post" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="checkbox">
                        <input id="checkbox-1" class="checkbox-custom form-check-input" name="checkbox-1" type="checkbox" checked>
                        <label for="checkbox-1" class="checkbox-custom-label form-check-label">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">log in</button>
                    <button type="button" class="btn btn-link btn-block">Forgot Password?</button>
                </form>
            </div>
        </div>
    </div>
</div>
