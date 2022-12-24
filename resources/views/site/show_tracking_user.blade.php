@include("site.include.header")
@include("site.include.navbar")

<br/>
<div class="container " style="overflow: auto">

    <table class="table table-hover   table-striped text-center">
        <thead class="table-dark">
            <th>{{ __("messages.icon") }}</th>
            <th>{{ __("messages.Name") }}</th>
            <th>{{ __("messages.website") }}</th>
            <th>{{ __("messages.facebook") }}</th>
            <th>{{ __("messages.Phone") }}</th>
        </thead>
        <tbody>
     @foreach($admin2=App\Models\track::paginate(8) as $track)
         
     <tr>
        <td>
            <div class="cart-anchor-image">
                <a href="">
                    <img loading="lazy" src="{{ asset("img/upload/track/".$track->icon) }}" alt="Product">
                </a>
            </div>
        </td>
        <td  style="vertical-align: middle">
            <div class="cart-price">{{ $track->name }}</div>
        </td>
        <td style="vertical-align: middle">
            <div class="cart-stock">
                {{ $track->website }}
            </div>
        </td>
        <td style="vertical-align: middle">
            <div class="cart-stock">
                {{ $track->facebook }}
            </div>
        </td>
        <td style="vertical-align: middle">
            <div class="cart-stock">
                {{ $track->phone }}
            </div>
        </td>
       
    </tr>
            @endforeach       





        </tbody>


    </table>
    </div>
   
<div class="d-flex justify-content-center">{{ $admin2->links() }}</div>

@include("site.include.footer1")
@include("site.include.footer")
