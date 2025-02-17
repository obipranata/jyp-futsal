<div class="p-2.5 bg-white-smoke rounded-lg justify-between space-y-4 flex-1 flex flex-col min-w-[300px] max-w-[365px]">
    <div class="space-y-4">
        <img src="{{$image}}" class="object-cover w-[342px] h-[255px] rounded-lg" alt="">
        <div class="space-y-1 pl-2 max-w-[342px] max-h-[255px]">
            <h2 class="text-xl font-semibold">{{$title}}</h2>
            <div class="flex items-center gap-2.5 text-mithril-color text-[10px]">
              <div class="w-[10px] h-[13px]">
                  <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9 5.41056C9 8.841 5 11.7814 5 11.7814C5 11.7814 1 8.841 1 5.41056C1 4.24081 1.42143 3.11896 2.17157 2.29182C2.92172 1.46468 3.93913 1 5 1C6.06087 1 7.07828 1.46468 7.82843 2.29182C8.57857 3.11896 9 4.24081 9 5.41056Z" stroke="#878787" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4.99984 6.88068C5.73622 6.88068 6.33317 6.22246 6.33317 5.4105C6.33317 4.59853 5.73622 3.94031 4.99984 3.94031C4.26346 3.94031 3.6665 4.59853 3.6665 5.4105C3.6665 6.22246 4.26346 6.88068 4.99984 6.88068Z" stroke="#878787" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>             
              </div>
                {{$address}}
            </div>
        </div>
        <div class="text-sm font-semibold pl-2">
            {{$price}} <span class="text-brilliant-licorice font-normal">/ Jam</span>
        </div>
    </div>
    @php
        $rating = 0;
    @endphp
    @foreach ($ratings as $item)
    @if ($item->penyewaan->lapangan->user_id === $userId)
            @php
                $rating = $item->avg_rating;
            @endphp
    @endif
    @endforeach
    <div class="pl-2 flex justify-between items-center">
        <div class="flex items-center gap-2.5 text-[12px]">
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.8264 7.12125L12.6242 9.91588L13.5835 14.0766C13.6342 14.2941 13.6198 14.5217 13.5418 14.7311C13.4639 14.9404 13.326 15.1221 13.1454 15.2535C12.9648 15.3849 12.7494 15.4601 12.5263 15.4697C12.3031 15.4794 12.0821 15.423 11.8908 15.3078L8.26189 13.1067L4.6408 15.3078C4.4495 15.423 4.22846 15.4794 4.00531 15.4697C3.78217 15.4601 3.56682 15.3849 3.38619 15.2535C3.20556 15.1221 3.06767 14.9404 2.98976 14.7311C2.91184 14.5217 2.89735 14.2941 2.94811 14.0766L3.90593 9.92014L0.703036 7.12125C0.533632 6.97514 0.411135 6.78228 0.350907 6.56683C0.290678 6.35138 0.2954 6.12295 0.364479 5.91018C0.433559 5.6974 0.56392 5.50976 0.739217 5.37078C0.914514 5.2318 1.12694 5.14767 1.34986 5.12894L5.57163 4.76328L7.21958 0.832617C7.30564 0.626368 7.4508 0.450192 7.63678 0.326273C7.82276 0.202353 8.04125 0.13623 8.26473 0.13623C8.48822 0.13623 8.7067 0.202353 8.89268 0.326273C9.07866 0.450192 9.22382 0.626368 9.30988 0.832617L10.9628 4.76328L15.1832 5.12894C15.4061 5.14767 15.6185 5.2318 15.7938 5.37078C15.9691 5.50976 16.0995 5.6974 16.1685 5.91018C16.2376 6.12295 16.2423 6.35138 16.1821 6.56683C16.1219 6.78228 15.9994 6.97514 15.83 7.12125H15.8264Z" fill="#FFB800"/>
            </svg>
            {{number_format($rating, 1)}} / 5
        </div>
        <a href="{{route('booking', $userId)}}" class="bg-north-star-blue text-sm text-white py-2.5 px-3 rounded-[50px]">Booking</a>
    </div>
</div>