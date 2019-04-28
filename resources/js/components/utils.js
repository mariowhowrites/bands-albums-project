import moment from "moment";

export function formatDate(dateString) {
    return moment(dateString).format("DD MMM YYYY");
}

export function createSortFunction(sortKey) {
    let sortFunction;

    switch (sortKey) {
        case "name":
            sortFunction = defaultSort("name");
            break;
        case "start_date":
            sortFunction = (first, second) => {
                if (moment(first.start_date).isBefore(second.start_date)) {
                    return -1;
                }

                if (moment(first.start_date).isSame(second.start_date)) {
                    return 0;
                }

                return 1;
            };
            break;
        case "website":
            sortFunction = defaultSort("website");
            break;
        case "still_active":
            sortFunction = (first, second) => {
                if (first.still_active < second.still_active) {
                    return -1;
                }

                if (first.still_active > second.still_active) {
                    return 1;
                }

                return 0;
            };
            break;
        default:
            sortFunction = null;
    }

    return sortFunction;
}

const defaultSort = function(sortKey) {
    return function(first, second) {
        const firstValue = first[sortKey].toUpperCase();
        const secondValue = second[sortKey].toUpperCase();

        if (firstValue < secondValue) {
            return -1;
        }

        if (firstValue > secondValue) {
            return 1;
        }

        return 0;
    };
};
