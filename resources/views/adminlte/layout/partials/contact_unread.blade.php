<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope-o"></i>
    <span class="label label-success">{{ \App\Model\Contacts::getCountUnRead() }}</span>
</a>
<ul class="dropdown-menu">
    <li class="header">@lang('Bạn có :number tin nhắn mới', ['number' => \App\Model\Contacts::getCountUnRead()])
    </li>
    <li>
        @if($contacts->isNotEmpty())
            <ul class="menu">
                @foreach($contacts as $contact)
                    <li>
                        <a href="{{ route('admin.contact.view', $contact->id) }}">
                            <div class="pull-left">
                                @if($contact->user && $contact->user->avatar)
                                    <img src="{{ $contact->user->avatar }}"
                                         class="img-circle" alt="User Image">
                                @else
                                    <img src="http://via.placeholder.com/160x160"
                                         class="img-circle" alt="User Image">
                                @endif
                            </div>
                            <h4>
                                {{ ($contact->user)? $contact->user->name : $contact->name }}
                                <small><i class="fa fa-clock-o"></i> {{ $contact->created_at->diffForHumans() }}
                                </small>
                            </h4>
                            <p>{{ $contact->title }}</p>
                        </a>
                    </li>
                    <!-- end message -->
                @endforeach
            </ul>
        @else
            <strong>@lang('Không có tin nhắn mới')</strong>
        @endif
    </li>
    <li class="footer"><a href="{{ route('admin.contact') }}">@lang('Xem tất cả tin nhắn')</a></li>
</ul>