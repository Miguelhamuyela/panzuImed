<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-xl ">
        <div class="modal-content" style="width: 900px; margin-left: -200px;">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Normativos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



            <div style="height:450px;width:100%;">

                @isset($item->file)
                <embed src="/storage/{{ $item->file }}" type="application/pdf" height="100%" width="100%" >


                    @endisset

            </div>



            </div>

        </div>
    </div>
</div>
