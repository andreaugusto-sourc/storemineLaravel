<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ["nome","descricao","imagem","preco","ativo","estoque","idCategoria"];

    public static function uploadImagem($request) {
        /* processo de upload de imagem */
         if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            /* pegando a imagem com o name */
            $requestImage = $request->imagem;
            /* pegando a extensao dessa imagem */
            $extensao = $requestImage->extension();
            /* criptografando o caminho da imagem */
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . $extensao);
            /* movendo a imagem para a pasta images/upload com o seu novo caminho */
            $requestImage->move(public_path('images/upload'),$imageName);
        }
        return $imageName;
    }
}
