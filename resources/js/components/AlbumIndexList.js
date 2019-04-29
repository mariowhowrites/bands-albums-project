import React from "react";
import { formatDate } from "./utils";

export default function AlbumIndexList({ albums }) {
    console.log(
        albums.filter(
            album => album.band.name === "stoltenberg abernathy kunze"
        )
    );
    return (
        <section>
            {albums.map(album => (
                <article
                    key={album.id}
                    className="mb-6 flex flex-col rounded shadow"
                >
                    <div className="bg-grey-light rounded-t pt-4 px-2">
                        <header className="text-2xl">
                            {album.name || "Excellent Album"}
                        </header>
                        <p className="pt-3">
                            By {album.band ? album.band.name : "Nobody"}
                        </p>
                        <p className="pt-1">
                            Released{" "}
                            {album.release_date
                                ? formatDate(album.release_date)
                                : "Forever Ago"}
                            . {album.number_of_tracks || "Numerous"} tracks
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
                        <p className="w-1/2 pb-3">
                            Genre: {album.genre || "Music"}
                        </p>
                        <p className="w-1/2 pb-3">
                            Label: {album.label || "Top Dawg Records"}
                        </p>
                        <p className="w-1/2 ">
                            Recorded On:{" "}
                            {album.recorded_date
                                ? formatDate(album.recorded_date)
                                : "One fine day"}
                        </p>
                        <p className="w-1/2">
                            Producer: {album.producer || "Sally the Producer"}
                        </p>
                    </div>
                </article>
            ))}
        </section>
    );
}
