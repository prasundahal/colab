<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Compose New Message</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <input name="to" class="form-control" placeholder="To:">
        </div>
        <div class="form-group">
            <input name="subject" class="form-control" placeholder="Subject:">
        </div>
        <div class="form-group">
            <textarea name="message" id="compose-textarea" class="form-control" style="height: 300px"></textarea>
        </div>
    </div>

    <div class="card-footer">
        <div class="float-right">
            {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
        </div>
        {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
    </div>

</div>
