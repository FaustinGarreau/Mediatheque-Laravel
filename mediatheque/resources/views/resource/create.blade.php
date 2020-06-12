<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1></h1>
<form action="{{ route('resource.store') }}" method="post">
    @csrf
        <div>
            <div>
                <div>
                    <label for="titre">Name:</label>
                    <input type="text" id="titre" name="titre" placeholder="Titre">
                        @error('titre')
                            <p>{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <div>
                    <label for="content">Content:</label>
                    <textarea style="height:150px" id="content" name="content" placeholder="Content"></textarea>
                        @error('content')
                            <p>{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <div>
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" placeholder="Author">
                        @error('author')
                            <p>{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <div>
                    <label for="additional_info">Additional info:</label>
                    <textarea style="height:150px" id="additional_info" name="additional_info" placeholder="Additional info"></textarea>
                        @error('additional_info')
                            <p>{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <div>
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date">
                        @error('date')
                            <p>{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <div>
                    <label for="addStock">Ajout stock:</label>
                    <input type="number" min="1" max="9" value="1" id="addStock" name="addStock">
                        @error('addStock')
                            <p>{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>