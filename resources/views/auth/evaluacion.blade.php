@extends('layouts.plantilla')

@section('title','Evaluación')

@section('content')

<div class="m-auto bg-white shadow rounded w-2/4 h-2/4">

    <table class="w-3/4 m-auto shadow rounded text-sm text-left text-gray-500 dark:text-gray-400 mb-5">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 text-center">
          <br>
          <br>
            <tr>
              <th scope="col" class="px-10 py-3">Pregunta</th>
              <th scope="col" class="px-10 py-3">A</th>
              <th scope="col" class="px-10 py-3">B</th>
              <th scope="col" class="px-10 py-3">C</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pregunta1 as $index => $p1)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
                <th class="px-6 py-4 font-medium">
                    1
                  </th>
              @if ($p1->opcion1 == $resp1)
                @if ($resp1 == $p1->correcta)
                <th class="px-6 py-4 font-medium font-bold bg-green-600">
                    <u class="font-bold text-green">{{$index+1}}</u>
                  </th>
                @else
                <th class="px-6 py-4 font-medium font-bold bg-red-600">
                    <u class="font-bold text-red">{{$index+1}}</u>
                  </th>  
                @endif
              @else
              <td class="px-6 py-4 font-medium">
                {{$p1->opcion1}}
            </td>
              @endif

              @if ($p1->opcion2 == $resp1)

              @if ($resp1 == $p1->correcta)
              <td class="px-6 py-4 font-medium bg-green-600">
                <u class="font-bold text-green">{{$p1->opcion2}}</u>
            </td>
              @else
              <td class="px-6 py-4 font-medium bg-red-600">
                <u class="font-bold text-red">{{$p1->opcion2}}</u>
            </td>
              @endif

              @else
              <td class="px-6 py-4 font-medium">
                {{$p1->opcion2}}
            </td>
              @endif
              
             @if ($p1->opcion3 == $resp1)

             @if ($resp1 == $p1->correcta)
             <td class="px-6 py-4 font-medium bg-green-600">
                <u class="font-bold text-green">{{$p1->opcion3}}</u>
            </td>
             @else
             <td class="px-6 py-4 font-medium bg-red-600">
                <u class="font-bold text-red">{{$p1->opcion3}}</u>
            </td>
             @endif
            
             @else
                 <td class="px-6 py-4 font-medium">
                    {{$p1->opcion3}}
                </td>
             @endif
              
          </tr>
            @endforeach

            @foreach ($pregunta2 as $index => $p2)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
              <th class="px-6 py-4 font-medium">
                  2
              </th>
              @if ($p2->opcion1 == $resp2)
              
              @if ($resp2 == $p2->correcta)
              <td class="px-6 py-4 font-medium bg-green-600">
                <u class="font-bold">{{$p2->opcion1}}</u>
            </td>

            @else

            <td class="px-6 py-4 font-medium bg-red-600">
                <u class="font-bold">{{$p2->opcion1}}</u>
            </td>
              @endif
              
              @else
              <td class="px-6 py-4 font-medium">
                {{$p2->opcion1}}
            </td>
              @endif

              @if ($resp2 == $p2->opcion2)
                  @if ($resp2 == $p2->correcta)
                  <td class="px-6 py-4 font-medium bg-green-600">
                    <u class="font-bold">{{$p2->opcion2}}</u>
                </td>
                  @else
                  <td class="px-6 py-4 font-medium bg-red-600">
                    <u class="font-bold">{{$p2->opcion2}}</u>
                </td> 
                  @endif
              @else
              <td class="px-6 py-4 font-medium">
                {{$p2->opcion2}}
            </td>
              @endif

              
              @if ($resp2 == $p2->opcion3)
                 @if ($resp2 == $p2->correcta)
                 <td class="px-6 py-4 font-medium bg-green-600">
                    <u class="font-bold">{{$p2->opcion3}}</u>
                </td>
                 @else
                 <td class="px-6 py-4 font-medium bg-red-600">
                    <u class="font-bold">{{$p2->opcion3}}</u>
                </td>
                 @endif 
              @else
              <td class="px-6 py-4 font-medium">
                {{$p2->opcion3}}
            </td>
              @endif
          </tr>
            @endforeach

            @foreach ($pregunta3 as $index => $p3)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
              <th class="px-6 py-4 font-medium">
                  3
              </th>
              @if ($resp3 == $p3->opcion1)
                 @if ($resp3 == $p3->correcta)
                 <td class="px-6 py-4 font-medium bg-green-600">
                   <u class="font-bold"> {{$p3->opcion1}}</u>
                </td>
                 @else
                 <td class="px-6 py-4 font-medium bg-red-600">
                    <u class="font-bold"> {{$p3->opcion1}}</u>
                </td>
                 @endif 
              @else
              <td class="px-6 py-4 font-medium">
                {{$p3->opcion1}}
            </td>
              @endif
            
              @if ($resp3 == $p3->opcion2)
                 @if ($resp3 == $p3->correcta)
                 <td class="px-6 py-4 font-medium bg-green-600">
                    <u class="font-bold">{{$p3->opcion2}}</u>
                </td>
                 @else
                 <td class="px-6 py-4 font-medium bg-red-600">
                    <u class="font-bold">{{$p3->opcion2}}</u>
                </td>
                 @endif 
              @else
              <td class="px-6 py-4 font-medium">
                {{$p3->opcion2}}
            </td>
              @endif

              @if ($resp3 == $p3->opcion3)
                 @if ($resp3 == $p3->correcta)
                 <td class="px-6 py-4 font-medium bg-green-600">
                    <u class="font-bold">{{$p3->opcion3}}</u>
                </td>
                 @else
                 <td class="px-6 py-4 font-medium bg-red-600">
                    <u class="font-bold">{{$p3->opcion3}}</u>
                </td>
                 @endif 
              @else
              <td class="px-6 py-4 font-medium">
                {{$p3->opcion3}}
            </td>
              @endif
          </tr>
            @endforeach


            @foreach ($pregunta4 as $index => $p4)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
              <th class="px-6 py-4 font-medium">
                  4
              </th>
              @if ($resp4 == $p4->opcion1)
                 @if ($resp4 == $p4->correcta)
                 <td class="px-6 py-4 font-medium bg-green-600">
                    <u class="font-bold">{{$p4->opcion1}}</u>
                </td>
                 @else
                 <td class="px-6 py-4 font-medium bg-red-600">
                    <u class="font-bold">{{$p4->opcion1}}</u>
                </td>
                 @endif 
              @else
              <td class="px-6 py-4 font-medium">
                {{$p4->opcion1}}
            </td>
              @endif


              @if ($resp4 == $p4->opcion2)
              @if ($resp4 == $p4->correcta)
              <td class="px-6 py-4 font-medium bg-green-600">
                 <u class="font-bold">{{$p4->opcion2}}</u>
             </td>
              @else
              <td class="px-6 py-4 font-medium bg-red-600">
                 <u class="font-bold">{{$p4->opcion2}}</u>
             </td>
              @endif 
           @else
           <td class="px-6 py-4 font-medium">
             {{$p4->opcion2}}
         </td>
           @endif

           @if ($resp4 == $p4->opcion3)
           @if ($resp4 == $p4->correcta)
           <td class="px-6 py-4 font-medium bg-green-600">
              <u class="font-bold">{{$p4->opcion3}}</u>
          </td>
           @else
           <td class="px-6 py-4 font-medium bg-red-600">
              <u class="font-bold">{{$p4->opcion3}}</u>
          </td>
           @endif 
        @else
        <td class="px-6 py-4 font-medium">
          {{$p4->opcion3}}
      </td>
        @endif
             
          </tr>
            @endforeach

            @foreach ($pregunta5 as $index => $p5)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
              <th class="px-6 py-4 font-medium">
                  5
              </th>

              @if ($resp5 == $p5->opcion1)
              @if ($resp5 == $p5->correcta)
              <td class="px-6 py-4 font-medium bg-green-600">
                 <u class="font-bold">{{$p5->opcion1}}</u>
             </td>
              @else
              <td class="px-6 py-4 font-medium bg-red-600">
                 <u class="font-bold">{{$p5->opcion1}}</u>
             </td>
              @endif 
           @else
           <td class="px-6 py-4 font-medium">
             {{$p5->opcion1}}
         </td>
           @endif

           @if ($resp5 == $p5->opcion2)
              @if ($resp5 == $p5->correcta)
              <td class="px-6 py-4 font-medium bg-green-600">
                 <u class="font-bold">{{$p5->opcion2}}</u>
             </td>
              @else
              <td class="px-6 py-4 font-medium bg-red-600">
                 <u class="font-bold">{{$p5->opcion2}}</u>
             </td>
              @endif 
           @else
           <td class="px-6 py-4 font-medium">
             {{$p5->opcion2}}
         </td>
           @endif

              
           @if ($resp5 == $p5->opcion3)
           @if ($resp5 == $p5->correcta)
           <td class="px-6 py-4 font-medium bg-green-600">
              <u class="font-bold">{{$p5->opcion3}}</u>
          </td>
           @else
           <td class="px-6 py-4 font-medium bg-red-600">
              <u class="font-bold">{{$p5->opcion3}}</u>
          </td>
           @endif 
        @else
        <td class="px-6 py-4 font-medium">
          {{$p5->opcion3}}
      </td>
        @endif
              
          </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
