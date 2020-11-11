package p1.util;

import java.time.LocalDate;

/**
 * Utility class to manage dates
 *
 *
 * @author Mireille Blay-Fornarino
 *
 *
 * 6 oct. 2018
 */
public final class DateTools {


    private DateTools() {
        throw new IllegalStateException("Utility class");
    }

    /**
     * @param date
     * @param nbDays number of days to be added
     * @return the {@code LocalDate} corresponding to the {@code Date}  to which {@code nbDays} days have been added
     */
    public static LocalDate addDays(LocalDate date, int nbDays) {
        return date.plusDays(nbDays);
    }


    /**
     * @param date
     * @param nbDays
     * @return the {@code LocalDate} array containing the  {@code date} and the following {@code nbDays}-1;
     */
    public static LocalDate[] getDays(LocalDate date, int nbDays) {
        if (nbDays == 0)
            return new LocalDate[nbDays];
        int i = 0;
        LocalDate[] dates = new LocalDate[nbDays];
        dates[i] = date;
        i+=1;
        while (i < nbDays) {
            dates[i] = addDays(date,i);
            i++;
        }
        return dates;
    }

}
