<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // AdminAllMusic
    public function AdminAllMusic()
    {
        $music = Music::latest()->get();
        return view('admin.backend.music.all_music', compact('music'));
    }
    // AdminAddMusic
    public function AdminAddMusic()
    {
        return view('admin.backend.music.add_music');
    }
    // AdminStoreMusic
    public function AdminStoreMusic(Request $request)
    {

        $request->validate([
            'audio' => 'mimetypes:audio/mpeg,audio/wav|max:50240',
            'video' => 'mimes:mp4,mov,mpeg|max:50240',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // PDF files, maximum 2MB
        ]);

        $image = $request->file('photo');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/music_images/'), $filename);
        $save_url = 'upload/music_images/' . $filename;

        $video = $request->file('video');
        $filename = time() . '.' . $video->getClientOriginalName();
        $video->move(public_path('upload/video/'), $filename);
        $save_video = 'upload/video/' . $filename;

        $audio = $request->file('audio');
        $filename = time() . '.' . $audio->getClientOriginalName();
        $audio->move(public_path('upload/audio/'), $filename);
        $save_audio = 'upload/audio/' . $filename;

        // $pdfPath = $request->file('pdf_file');
        // $filename = date('YmdHi') . $pdfPath->getClientOriginalName();
        // $pdfPath->move(public_path('upload/bronchure'), $filename);

        Music::insert([
            'artist_name' => $request->artist_name,
            'song_title' => $request->song_title,
            'youtube_url' => $request->youtube_url,
            'video' => $save_video,
            'audio' => $save_audio,
            'photo' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.music')->with($notification);
    }
    // AdminEditVideo
    public function AdminEditMusic($id)
    {
        $music = Music::find($id);
        return view('admin.backend.music.edit_music', compact('music'));
    }
    //
    // UpdateMusic
    public function AdminUpdateMusic(Request $request)
    {
        $music_id = $request->music_id;
        $oldImage = $request->old_img;
        $oldVideo = $request->old_vid;
        $oldAudio = $request->old_aud;

        if ($request->file('photo')) {
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $image = $request->file('photo');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/music_images/'), $filename);
            $save_url = 'upload/music_images/' . $filename;

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            Music::find($music_id)->update([
                'artist_name' => $request->artist_name,
                'song_title' => $request->song_title,
                'youtube_url' => $request->youtube_url,
                // 'video' => $save_video,
                // 'audio' => $save_audio,
                'photo' => $save_url,
                'updated_at' => Carbon::now()
            ]);
        } else if ($request->file('video')) {
            if (file_exists($oldVideo)) {
                unlink($oldVideo);
            }

            $video = $request->file('video');
            $filename = time() . '.' . $video->getClientOriginalName();
            $video->move(public_path('upload/video/'), $filename);
            $save_video = 'upload/video/' . $filename;

            if (file_exists($oldVideo)) {
                unlink($oldVideo);
            }

            Music::find($music_id)->update([
                'artist_name' => $request->artist_name,
                'song_title' => $request->song_title,
                'youtube_url' => $request->youtube_url,
                'video' => $save_video,
                // 'audio' => $save_audio,
                // 'photo' => $save_url,
                'updated_at' => Carbon::now()
            ]);
        } else if ($request->file('audio')) {
            if (file_exists($oldAudio)) {
                unlink($oldAudio);
            }

            $audio = $request->file('audio');
            $filename = time() . '.' . $audio->getClientOriginalName();
            $audio->move(public_path('upload/audio/'), $filename);
            $save_audio = 'upload/audio/' . $filename;

            if (file_exists($oldAudio)) {
                unlink($oldAudio);
            }

            Music::find($music_id)->update([
                'artist_name' => $request->artist_name,
                'song_title' => $request->song_title,
                'youtube_url' => $request->youtube_url,
                // 'video' => $save_video,
                'audio' => $save_audio,
                // 'photo' => $save_url,
                'updated_at' => Carbon::now()
            ]);
        } else {
            Music::find($music_id)->update([
                'artist_name' => $request->artist_name,
                'song_title' => $request->song_title,
                'youtube_url' => $request->youtube_url,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Music Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.music')->with($notification);
    }
    // AdminDeleteMusic
        public function AdminDeleteMusic($id)
        {
            $music = Music::find($id);
            $oldImage = $music->old_img;
            $oldVideo = $music->old_vid;
            $oldAudio = $music->old_aud;

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            if (file_exists($oldVideo)) {
                unlink($oldVideo);
            }

            if (file_exists($oldAudio)) {
                unlink($oldAudio);
            }

            Music::find($id)->delete();
            $notification = array(
                'message' => 'Music deleted Successfully',
                'alert-type' => 'error'
            );
            return redirect()->route('all.music')->with($notification);
        }
}
