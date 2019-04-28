import React from "react";

export default function BandIndexHeader({ changeSort }) {
    return (
        <article className="flex w-full pt-2 px-2 pb-1 border-b-2 font-bold">
            <span
                onClick={() => changeSort("name")}
                className="w-2/5 cursor-pointer select-none"
            >
                Name
            </span>
            <span
                onClick={() => changeSort("start_date")}
                className="w-1/5 cursor-pointer select-none"
            >
                Start Date
            </span>
            <span
                onClick={() => changeSort("website")}
                className="w-1/5 cursor-pointer select-none"
            >
                Website
            </span>
            <span
                onClick={() => changeSort("still_active")}
                className="w-1/5 cursor-pointer select-none"
            >
                Still Active?
            </span>
            <span className="w-1/5">Actions</span>
        </article>
    );
}
