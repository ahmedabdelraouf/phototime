<div class="row">
    <div class="table-responsive">
        <form action="{{ route("admin.categories.update_images_settings") }}" method="POST" id="updateOrder">
            <input type="hidden" name="album_id" value="{{ $category->id }}">

            <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                <i class="fa fa-fw mr-2 fa-edit"></i> Update Images Settings
            </button>
            <br>
            <br>
            <br>
            <br>

            <div class="image-list">
                @forelse($images as $image)
                    <div class="image-item">
{{--                        <img src="{{ images_path($image->image) }}" style="width: 200px; height: 200px">--}}

                        <img src="{{ $image->image }}" style="width: 200px; height: 200px">
                        <div class="image-details">
                            <label class="delete-label">
                                <input type="checkbox" class="js-switch" name="delete_images[]" value="{{ $image->id }}">
                                Delete
                            </label>
{{--                            <input type="number" class="form-group order-input" name="images[{{ $image->id }}]" value="{{ $image->order }}" min="1">--}}
                        </div>
                    </div>
                @empty
                    <h4 style="width: 100%; color: #ff0000; text-align: center">No Images added</h4>
                @endforelse
            </div>
        </form>
    </div>
</div>

<style>
    .image-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .image-item {
        margin-bottom: 20px;
        text-align: center;
        border: 1px solid #ccc; /* Designed border */
        padding: 10px;
    }

    .image-item img {
        width: 100%; /* Ensure the image takes the full width */
        height: auto; /* Maintain aspect ratio */
    }

    .image-details {
        margin-top: 10px;
        display: flex;
        justify-content: space-between; /* Add space between delete and order inputs */
        align-items: center; /* Align items vertically in the center */
    }

    .delete-label {
        display: flex;
        align-items: center; /* Align items vertically in the center */
    }

    .delete-label input[type="checkbox"]:checked + span {
        color: red; /* Change color to red when checked */
    }

    .delete-label span {
        margin-left: 5px; /* Add some space between checkbox and text */
    }

    /* Rest of your existing styles for select and options */

    /* Additional style for input number */
    .order-input {
        width: 80px; /* Increased width */
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
