import React from "react";
import { formatDate } from "./utils";

export default function BandIndexList({ bands }) {
    return bands.map((band, index) => {
        return (
            <article
                key={band.id}
                dusk={band.name}
                className={listItemClasses(index)}
            >
                <span className="w-2/5">
                    {band.name || "Ted's Excellent Band"}
                </span>
                <span className="w-1/5">
                    {band.start_date
                        ? formatDate(band.start_date)
                        : "In the past"}
                </span>
                <span className="w-1/5">{band.website || "No website"}</span>
                <span className="w-1/5">
                    {band.still_active ? "Active" : "Retired"}
                </span>
                <span className="w-1/5">
                    <a
                        href={band.routes.edit}
                        className="px-2 py-1 rounded-full border border-black bg-blue-lighter no-underline text-black mr-2 hover:shadow hover:bg-blue-light"
                    >
                        Edit
                    </a>
                    <a
                        href={band.routes.delete}
                        className="px-2 py-1 rounded-full border border-black bg-red-lighter no-underline text-black hover:shadow hover:bg-red-light"
                    >
                        Delete
                    </a>
                </span>
            </article>
        );
    });
}

function listItemClasses(index) {
    let classes = "flex w-full px-2 py-3 hover:shadow";

    if (index % 2 === 0) {
        classes = `${classes} bg-grey-light`;
    }

    return classes;
}
