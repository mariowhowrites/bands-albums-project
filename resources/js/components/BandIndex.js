import React, { useState } from "react";
import ReactDOM from "react-dom";
import BandIndexHeader from "./BandIndexHeader";
import BandIndexList from "./BandIndexList";
import { createSortFunction } from "./utils";

export default function BandIndex({ bands: rawBands }) {
    let bands = JSON.parse(rawBands);

    let [sortKey, setSortKey] = useState(null);
    let [isAscending, setIsAscending] = useState(true);

    const changeSort = sortKey => {
        setSortKey(sortKey);
        setIsAscending(!isAscending);
    };

    if (sortKey !== null) {
        let sortFunction = createSortFunction(sortKey);

        bands = sortFunction ? bands.sort(sortFunction) : bands.sort();
    }

    if (!isAscending) {
        bands = bands.reverse();
    }

    return (
        <section className="border rounded" dusk="band-index">
            <BandIndexHeader changeSort={changeSort} />
            <BandIndexList bands={bands} />
        </section>
    );
}

if (document.getElementById("band-index")) {
    const bandIndexDiv = document.getElementById("band-index");
    const props = Object.assign({}, bandIndexDiv.dataset);
    ReactDOM.render(<BandIndex {...props} />, bandIndexDiv);
}
