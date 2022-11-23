{{--
session()->flash('flash_message', [
        'heading' => 'Heading',
        'message' => 'Testing',
        'type' => 'bg-success'
    ]);
    --}}

<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts position-static">
    <div class="toast-container p-3 start-50 translate-middle-x fixed-top mt-5" id="toastPlacement">
        @if(session()->has('flash_message'))
            <div class="toast">
                <div class="toast-header">
                    <strong class="me-auto">{{session('flash_message')['heading']}}</strong>
                    <small class="p-2 rounded-3 @if(isset(session('flash_message')['type'])){{session('flash_message')['type']}}@endif"></small>
                </div>
                <div class="toast-body">
                    {{session('flash_message')['message']}}
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    const toastLiveExamples = document.querySelectorAll('.toast');
    let toast;
    toastLiveExamples.forEach(function (e) {
        toast = new bootstrap.Toast(e)
        toast.show();
    });
</script>
