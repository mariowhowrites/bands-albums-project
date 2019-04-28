import React, { useState } from "react";
import ReactDOM from "react-dom";
import AlbumIndexHeader from "./AlbumIndexHeader";
import AlbumIndexList from "./AlbumIndexList";
import { map } from "lodash";

export default function AlbumIndex({ bands: rawBands, albums: rawAlbums }) {
    let bands = JSON.parse(rawBands);
    let albums = JSON.parse(rawAlbums);

    let [selectedBand, setSelectedBand] = useState("");
    let [selectedGenre, setSelectedGenre] = useState("");

    const genres = new Set(map(albums, "genre"));

    if (selectedBand !== "") {
        albums = albums.filter(album => album.band.name === selectedBand);
    }

    if (selectedGenre !== "") {
        albums = albums.filter(album => album.genre === selectedGenre);
    }

    return (
        <React.Fragment>
            <AlbumIndexHeader
                bands={bands}
                setSelectedBand={setSelectedBand}
                genres={genres}
                setSelectedGenre={setSelectedGenre}
            />
            <AlbumIndexList albums={albums} />
        </React.Fragment>
    );
}

if (document.getElementById("album-index")) {
    const albumIndexDiv = document.getElementById("album-index");
    const props = Object.assign({}, albumIndexDiv.dataset);
    ReactDOM.render(<AlbumIndex {...props} />, albumIndexDiv);
}
