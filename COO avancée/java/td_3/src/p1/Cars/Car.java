package p1.cars;

/**
 * This class defines the notion of a car to be rented by associating it with a price per day.
 *
 *  @author Mireille Blay-Fornarino
 *
 * @version 1.0
 */

public class Car {

    private String numberPlate;
    private double dayPrice;


    public Car(String numberPlate, double dayPrice) {
        this.numberPlate = numberPlate;
        this.dayPrice = dayPrice;
    }

    public String getNumberPlate() {
        return numberPlate;
    }
    public void setNumberPlate(String numberPlate) {
        this.numberPlate = numberPlate;
    }
    public double getDayPrice() {
        return dayPrice;
    }
    public void setDayPrice(double dayPrice) {
        this.dayPrice = dayPrice;
    }

    @Override
    public String toString() {
        return "Car [numberPlate=" + numberPlate + // ", rentals=" + rentals +
                ", dayPrice=" + dayPrice + "]";
    }

}