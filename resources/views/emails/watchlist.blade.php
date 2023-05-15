{{-- @component('mail::message')
#Your order was shipped

Some details about the order...

Thanks, <br>
Laravel --}}

    {{-- @component('mail::button', ['url' => 'link'])
        More Details
    @endcomponent --}}

{{-- @endcomponent --}}
@component('mail::message')
# {{ $maildata['title'] }}

Dear Team,

Refer the watchlist item expiring in table below for your reference and further action. Click <a href="{{route('pmd.watchlist')}}">here</a> to take an action.

@component('mail::table')
| Item Description          | Project                     | Expiry Date                | Days Left         | 
| :------------------------ | :-------------------------- | :------------------------- | :---------------- |
@if(isset($maildata['todays']))
@foreach ($maildata['todays'] as $today)
| {{$today->item_desc}}     | {{$today->project_name}}    | {{$today->expiry_date}}    | Today             |
@endforeach
@endif
@if(isset($maildata['sevendays']))
@foreach ($maildata['sevendays'] as $sevenday)
| {{$sevenday->item_desc}}  | {{$sevenday->project_name}} | {{$sevenday->expiry_date}} | Less than 7 Days  |
@endforeach
@endif
@if(isset($maildata['fourteens']))
@foreach ($maildata['fourteens'] as $fourteen)
| {{$fourteen->item_desc}}  | {{$fourteen->project_name}} | {{$fourteen->expiry_date}} | Less than 14 Days |
@endforeach
@endif
@if(isset($maildata['thirtydays']))
@foreach ($maildata['thirtydays'] as $thirtyday)
| {{$thirtyday->item_desc}} | {{$thirtyday->project_name}}| {{$thirtyday->expiry_date}}| Less than 30 Days |
@endforeach
@endif
@endcomponent

Thanks,

{{ config('app.name') }}
@endcomponent
{{-- <div>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Expiry Date</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->item_desc}}</td>
            <td>{{$item->expiry_date}}</td>
        </tr>
    </table>
</div> --}}

