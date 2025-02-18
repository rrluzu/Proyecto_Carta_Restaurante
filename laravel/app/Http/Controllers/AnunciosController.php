<?php

namespace App\Http\Controllers;

use App\Models\Anuncios;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class AnunciosController extends Controller
{
    public function crearAnuncios()
    {   
        return view('gest_admin.createAnnouncements');
    }

    public function insertarAnuncios(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:150',
            'mensaje' => 'required|max:500',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ], [
            'fecha_fin.after_or_equal' => 'La fecha de fin no puede ser anterior a la fecha de inicio.',
        ]);

        // Crear el anuncio en la base de datos
        $anuncio = Anuncios::create($request->all());

        // Formar el mensaje para Telegram
        $text = "<b>📢 Nuevo Anuncio Publicado:</b>\n\n"
            . "<b>" . htmlspecialchars($anuncio->titulo) . "</b>\n"
            . htmlspecialchars($anuncio->mensaje) . "\n"
            . "<b>🗓️ Fecha de Inicio:</b> " . $anuncio->fecha_inicio . "\n"
            . "<b>⏰ Fecha de Fin:</b> " . $anuncio->fecha_fin;

        // Enviar el mensaje a Telegram
        $respuesta = Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML', // Aplica el formato HTML Para que detecte las etiquetas <b>
            'text' => $text
        ]);

        $telegramID = $respuesta['message_id'];

        // Actualizar el anuncio con el ID del mensaje de Telegram
        $anuncio->update(['mensaje_telegram_id' => $telegramID]);


        return redirect()->route('gest_admin.manager')->with('success', 'Anuncio creado correctamente.');
    }

    public function editarAnuncios($id)
    {
        $anuncio = Anuncios::findOrFail($id); // Buscar el anuncio por ID
        return view('gest_admin.modifyAnnouncements', compact('anuncio'));
    }

    public function actualizarAnuncios(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:150',
            'mensaje' => 'required|max:500',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        // Comprobar si la fecha de fin es anterior a la fecha de inicio
        if ($request->fecha_fin < $request->fecha_inicio) {
            return redirect()->back()->with('danger', 'Inserta una fecha fin posterior a la fecha de inicio.');
        }

        $anuncio = Anuncios::findOrFail($id);
        $anuncio->update($request->all());

        // Nuevo mensaje indicando que se ha actualizado
        $text = "<b>📢 Anuncio Actualizado:</b>\n\n"
            . "<b>" . htmlspecialchars($anuncio->titulo) . "</b>\n"
            . htmlspecialchars($anuncio->mensaje) . "\n"
            . "<b>🗓️ Fecha de Inicio:</b> " . $anuncio->fecha_inicio . "\n"
            . "<b>⏰ Fecha de Fin:</b> " . $anuncio->fecha_fin;

        // Si el anuncio tiene un ID de mensaje en Telegram, lo editamos
        if ($anuncio->mensaje_telegram_id) {
            Telegram::editMessageText([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'message_id' => $anuncio->mensaje_telegram_id,
                'parse_mode' => 'HTML',
                'text' => $text,
            ]);
        }

        return redirect()->route('gest_admin.manager')->with('success', 'Anuncio actualizado correctamente.');
    }

    public function eliminarAnuncios($id)
    {
        $anuncio = Anuncios::findOrFail($id); // Buscar el anuncio por ID
        
        // Si el anuncio tiene un mensaje de Telegram asociado, intentamos eliminarlo
        if ($anuncio->mensaje_telegram_id) {
            Telegram::deleteMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'message_id' => $anuncio->mensaje_telegram_id,
            ]);
        }

        $anuncio->delete();
        
        return redirect()->route('gest_admin.manager')->with('success', 'Anuncio eliminado correctamente.');
    }
}