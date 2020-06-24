<style>
    /* Dropdown Button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 335px;
        box-shadow: 0px 8px 18px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: 44px;
        width: 250px;
        border-radius: 0px 0 10px 10px;
        overflow: hidden;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    /* new search style  */
    .search-form-wrapper,
    .search-form-wrapper form {
        width: 100%;
    }

    .search-wrapper .search-field {
        width: 100%;
    }

    .search-select {
        position: absolute;
        border: none;
        width: 27%;
        cursor: pointer;
        padding: 0 !important;
        height: 25px;
        top: 15px;
        background-color:white;
        outline: none;
        -moz-appearance: none;
        -webkit-appearance: none;
        background-image: linear-gradient(45deg, transparent 50%, gray 50%), linear-gradient(135deg, gray 50%, transparent 50%), linear-gradient(to right, #ccc, #ccc);
        background-position: calc(100% - 10px) calc(1em + -5px), calc(100% - 5px) calc(1em + -5px), calc(100% - 0.1em) 0.1em;
        background-size: 5px 5px, 5px 5px, 1px 1.5em;
        background-repeat: no-repeat;
        left: 18px;
    }

    .search-select::focus {
        background-image:
            linear-gradient(45deg, green 50%, transparent 50%),
            linear-gradient(135deg, transparent 50%, green 50%),
            linear-gradient(to right, #ccc, #ccc);
        background-position:
            calc(100% - 15px) 1em,
            calc(100% - 20px) 1em,
            calc(100% - 2.5em) 0.5em;
        background-size:
            5px 5px,
            5px 5px,
            1px 1.5em;
        background-repeat: no-repeat;
        border-color: green;
        outline: 0;
    }

    /* for IE */
    .search-select::-ms-expand {
        display: none !important;
    }

    .search_input {
        padding-left: 32% !important;
    }
</style>
<div class="col-lg-4  justify-content-center   ">
    <div class="d-flex justify-content-center  search-form-wrapper">
        <form autocomplete="off" style="margin-top:5px;" action="{{route('advanced.search.products')}}" class="showroom-search">
            <div class="searchbar" style="display: relative">
                <select class="search-select">
                    <option @if(request()->route()->getName() == 'advanced.search.products') selected @endif value="{{route('advanced.search.products')}}">Products</option>
                    <option @if(request()->route()->getName() == 'advanced.search.showrooms') selected @endif value="{{route('advanced.search.showrooms')}}" >showrooms</option>
                    <option @if(request()->route()->getName() == 'advanced.search.offers') selected @endif value="{{route('advanced.search.offers')}}">Offers</option>
                    <option @if(request()->route()->getName() == 'advanced.search.ideas') selected @endif value="{{route('advanced.search.ideas')}}">Ideas</option>
                </select>
                <input value="{{request('keyword')}}" class="search_input" id="search" type="text" name="keyword" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {

        $(document).on('click', '.search_icon', function(e) {
            e.preventDefault();
            $(".showroom-search").submit();
        });

        $('.search-select').change(function(e) {
            console.log($(this).val());
            $('.showroom-search').attr('action', $(this).val());
        });

    })
</script>