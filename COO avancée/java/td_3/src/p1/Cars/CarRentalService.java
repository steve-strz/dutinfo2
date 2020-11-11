package p1.cars;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;

import p1.util.DateTools;
import p1.util.NotPossibleCarRentalException;


/**
 *
 * This class allows the management of a set of car rentals
 *
 *
 * @author Mireille Blay-Fornarino
 *
 *
 */
public class CarRentalService {

    //Set of cars for rent
    private List<Car> cars;

    //All registered car rentals
    private List<CarRental> carRentals = new ArrayList<>();

    //To create a car rental service,  you need to have cars.
    public CarRentalService(List<Car> cars) {
        super();
        this.cars = cars;
    }


    /**
     * @param d : first day
     * @param nbDays : number of days
     * @return the available cars  from the first day during {@code nbDays} days
     */
    public List<Car> getAvailableCars(LocalDate d, int nbDays) {
        ArrayList<Car> availableCars = new ArrayList<>();
        LocalDate[] dates = DateTools.getDays(d, nbDays);
        for (Car c : cars) {
            if (isAvailable(c, dates)) {
                availableCars.add(c);
            }
        }
        return availableCars;
    }


    private boolean isAvailable(Car c, LocalDate[] dates) {
        for (CarRental carRental : carRentals) {
            if (c.equals(carRental.getCar()) &&
                    (carRental.includeADate(dates)) ) {
                return false;
            }
        }
        return true;
    }



    /**
     * It books the car rental and returns the created {@code CarRental}
     * @param c : {@code Car} for rent
     * @param fromDate : {@code LocalDate} first day for rental
     * @param numberOfDays
     * @return the rental of {@code Car} {@code c} from the first day  {@code  fromDate} during  {@code numberOfDays}
     * @throws NotPossibleCarRentalException
     */
    public CarRental book(Car c, LocalDate fromDate, int numberOfDays) throws NotPossibleCarRentalException  {
        CarRental carRental = null;
        if (cars == null || !(cars.contains(c)) )
            throw new NotPossibleCarRentalException("Not known car");
        LocalDate[] dates = DateTools.getDays(fromDate, numberOfDays);
        if (isAvailable(c, dates)) {
            carRental = new CarRental(c, fromDate, numberOfDays);
            carRentals.add(carRental);
        }
        return carRental;
    }



}