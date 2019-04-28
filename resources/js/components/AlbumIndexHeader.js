import React from "react";

export default function AlbumIndexHeader({
    bands,
    setSelectedBand,
    genres,
    setSelectedGenre
}) {
    return (
        <aside className="flex justify-between items-baseline">
            <div className="flex items-baseline">
                <header>
                    <h1 className="my-6">All Albums</h1>
                </header>
                <div className="ml-6">
                    <a className="font-bold" href="/album/create">
                        Add New Album
                    </a>
                </div>
            </div>
            <div>
                <select
                    className="bg-grey py-2 pl-1 rounded shadow mr-4"
                    name="bandFilter"
                    id="bandFilter"
                    defaultValue=""
                    onChange={event => {
                        setSelectedBand(event.target.value);
                    }}
                >
                    <option value="">All Artists</option>
                    {bands.map(band => (
                        <option key={band.id} value={band.name}>
                            {band.name}
                        </option>
                    ))}
                </select>
                <select
                    className="bg-grey py-2 pl-1 rounded shadow"
                    name="bandFilter"
                    id="bandFilter"
                    defaultValue=""
                    onChange={event => {
                        setSelectedGenre(event.target.value);
                    }}
                >
                    <option value="">
                        All Genres
                    </option>
                    {[...genres].map(genre => (
                        <option key={genre} value={genre}>
                            {genre}
                        </option>
                    ))}
                </select>
            </div>
        </aside>
    );
}
