<div>

    <div class=" mt-3" >
        <div class="row">
            <div class="col-3" >

                @forelse($mails as $mail)
                    <div wire:click="selectMail({{$mail->id}})" class="container bg-light p-2 flex-column border-bottom mail mail--js @if (!$mail->read AND $mail->id != $mailModel->id)) unread @endif
                    @if ($mail->id == $mailModel->id) selected @endif"
                    >
                        <div>

                            @if (!$mail->read AND $mail->id != $mailModel->id)
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="blue" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>
                            @endif

                            {{ $mail->subject }}
                        </div>

                        <div style="display: flex; flex-wrap: wrap; justify-content: space-between">
                            <div>
                                <span> {{ $mail->to[0] }} </span>
                            </div>
                            <div class="float-end">
                                <span style="font-size: 12px"><i>{{ $mail->created_at->diffForHumans() }}</i></span>
                            </div>
                        </div>
                    </div>
                @empty
                    No mail found
                @endforelse

                <div class="pagination-links mt-3">
                    {{ $mails->links('livemail::pagination') }}
                </div>

            </div>

            <div class="col-9">

                @if($mailModel)


                <div class="card">
                    <div class="card-body" style="height: 800px">

                        <div wire:loading>
                            Loading email...
                        </div>

                        <div wire:loading.remove>
                            <h3>{{ $mailModel->subject }}</h3>

                            <strong>From:</strong> {{ $mailModel->from_name }} < {{ $mailModel->from_email }} ><br />
                            <strong>To:</strong>
                            @foreach($mailModel->to as $to)
                                {{ $to }}@if(!$loop->last),@endif
                            @endforeach<br />

                            <strong>CC:</strong>
                            @foreach($mailModel->cc as $cc)
                                {{ $cc }}@if(!$loop->last),@endif
                            @endforeach<br />

                            <strong>BCC:</strong>
                            @foreach($mailModel->bcc as $bcc)
                                {{ $bcc }}@if(!$loop->last),@endif
                            @endforeach<br />

                            {{ $mailModel->created_at->format('M d, Y \a\t H:i') }}

{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">--}}
{{--                                <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>--}}
{{--                            </svg> <a href="">Uploaded.png</a>--}}

                        </div>

                        <hr />

                        <iframe width="100%" height="100%" style="overflow: scroll" wire:loading.remove src="{{ route('livemail.render', ['mail_id' => $mailId]) }}"></iframe>
                    </div>
                </div>

                @else

                    Empty state

                @endif

            </div>
        </div>
    </div>

</div>
