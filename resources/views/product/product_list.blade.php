<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Shop</title>


        <style>
            /* Flex container */
            #p-flex {
                max-width: 1200px;
                margin: 25px auto;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }
            /* Product items */
            div.p-flex {
                width: 25%;
                box-sizing: border-box;
                border: 1px solid #000;
                padding: 10px;
            }

            html, body {
                padding: 0;
                margin: 0;
                font-family: arial, sans-serif;
            }
        </style>

    </head>
    <body>
        <div>

            <form>
                <div style="margin: 10px;">
                    search:
                    <input type="text" name="search" value="{{ request()->input('search') }}">

                    Price From:
                    <input type="text" name="price_from" value="{{ request()->input('price_from') }}">
                    Price To:
                    <input type="text" name="price_to" value="{{ request()->input('price_to') }}">

                    <button type="submit">فیلتر</button>
                </div>

            </form>

            <div id="p-flex">
                    @foreach($data as $item)
                        <div class="p-flex">
                            <div>
                                {{ $item->name }}
                            </div>
                            <div>
                                قیمت:
                                {{ $item->price }}
                            </div>
                            <div>
                                رنگ‌ها:
                                @php
                                    $colorsArr = explode(',', $item->colors);
                                @endphp

                                @foreach($colorsArr as $color)
                                    {{ $color }},
                                @endforeach
                            </div>
                        </div>
                    @endforeach
            </div>


            {{ $data->appends([
                                'price_from' => request()->input('price_from', null),
                                'price_to' => request()->input('price_to', null),
                                'search' => request()->input('search', null),
                            ])->links() }}


        </div>
    </body>
</html>
