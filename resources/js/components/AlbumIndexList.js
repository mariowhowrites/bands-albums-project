import React from "react";
import { formatDate } from "./utils"

export default function AlbumIndexList({ albums }) {
    return (
        <section>
            {albums.map(album => (
                <article
                    key={album.id}
                    className="mb-6 flex flex-col rounded shadow"
                >
                    <div className="bg-grey-light rounded-t pt-4 px-2">
                        <header className="text-2xl">{album.name}</header>
                        <p className="pt-3">By {album.band.name}</p>
                        <p className="pt-1">
                            Released {formatDate(album.release_date)}.{" "}
                            {album.number_of_tracks} tracks
                        </p>
                        <p className="py-6">
                            <a
                                href={album.routes.edit}
                                className="px-2 py-1 rounded-full border border-black bg-blue-lighter no-underline text-black mr-2 hover:shadow hover:bg-blue-light"
                            >
                                Edit
                            </a>
                            <a
                                href={album.routes.delete}
                                className="px-2 py-1 rounded-full border border-black bg-red-lighter no-underline text-black hover:shadow hover:bg-red-light"
                            >
                                Delete
                            </a>
                        </p>
                    </div>
                    <div className="flex flex-wrap px-2 py-6">
                        <p className="w-1/2 pb-3">Genre: {album.genre}</p>
                        <p className="w-1/2 pb-3">Label: {album.label}</p>
                        <p className="w-1/2 ">
                            Recorded On: {formatDate(album.recorded_date)}
                        </p>
                        <p className="w-1/2">Producer: {album.producer}</p>
                    </div>
                </article>
            ))}
        </section>
    );
}


